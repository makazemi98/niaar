<?php

namespace App\Repositories;

use App\Enums\CommentTypesEnum;
use App\Enums\InquiryDocsCollectionEnum;
use App\Enums\InquiryStatusesEnum;
use App\Interfaces\Repositories\InquiryRepositoryInterface;
use App\Models\Inquiry;
use App\Models\User;
use App\Notifications\UserWasMentioned;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InquiryRepository extends BaseRepository implements InquiryRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Inquiry::class);
    }

    /**
     * Get filtered inquiries list
     *
     * @param array $filters
     * @return LengthAwarePaginator
     */
    public function list(array $filters)
    {
        return $this->model
            ->with([
                'client',
                'assignedTo',
                'creator'
            ])
            ->when(isset($filters['client']), function($query) use($filters) {
                $query->whereHas('client', function ($q) use ($filters) {
                    $q->where(
                        DB::raw('CONCAT_WS(" ", first_name, last_name)'),
                        'LIKE',
                        "%{$filters['client']}%"
                    );
                });
            })
            // This filter used in accounting profit tab
            ->when(isset($filters['client_id']), function($query) use($filters) {
                $query->where('client_id', $filters['client_id']);
            })
            ->when(isset($filters['assigned_to']), function($query) use($filters) {
                $query->whereHas('assignedTo', function ($q) use ($filters) {
                    $q->where(
                        DB::raw('CONCAT_WS(" ", first_name, last_name)'),
                        'LIKE',
                        "%{$filters['assigned_to']}%"
                    );
                });
            })
            ->when(isset($filters['status']), function ($query) use ($filters) {
                if ($filters['status'] !== 'all') {
                    $query->currentStatus($filters['status']);
                }
            })
            ->when(
                isset($filters['from_created_at']) && !isset($filters['to_created_at']),
                function ($query) use($filters) {
                    $query->whereDate('created_at', '>=', $filters['from_created_at']);
                }
            )
            ->when(
                !isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use($filters) {
                    $query->whereDate('created_at', '<=', $filters['to_created_at']);
                }
            )
            ->when(
                isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use($filters) {
                    $query->whereBetween(
                        'created_at',
                        [
                            $filters['from_created_at'],
                            $filters['to_created_at']
                        ]
                    );
                }
            )
            ->when(isset($filters['number']), function ($query) use ($filters) {
                $query->where('id', $filters['number']);
            })
            ->orderBy(
                'id',
                $filters['order'] ?? 'desc'
            )
            ->paginate($filters['per_page'] ?? 15);
    }

    public function count(){
        return $this->model::count();
    }

    /**
     * Store a new inquiry
     *
     * @param array $inquiryData
     * @return Inquiry | \Exception
     */
    public function storeInquiry(array $inquiryData): Inquiry | \Exception
    {
       DB::beginTransaction();

        try {
            $inquiry = $this->store([
                'client_id' => $inquiryData['client_id'],
                'title' => $inquiryData['title'],
                'description' => $inquiryData['description'],
                'remark' => $inquiryData['remark'] ?? null,
                'created_by' => Auth::id(),
                'assigned_to' => null
            ]);

            $inquiry->setStatus(InquiryStatusesEnum::OPEN->value);
            if (isset($inquiryData['docs'])) {
                foreach ($inquiryData['docs'] as $doc) {
                    $path = Storage::disk('inquiries')
                        ->putFileAs(
                            "/",
                            $doc,
                            $inquiry->id . '/' .$doc->getClientOriginalName()
                        );

                    $inquiry->addMediaFromDisk($path, 'inquiries')->toMediaCollection(InquiryDocsCollectionEnum::DOCS->value);

                    $inquiry->comments()->create([
                        'body' => trans('messages.inquiries.comments.add_file.docs', [
                            'file_name' => $doc->getClientOriginalName()
                        ]),
                        'created_by' => Auth::id()
                    ]);
                }
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        return $inquiry;
    }

    /**
     * Assign an inquiry to as user
     *
     * @param Inquiry $inquiry
     * @param int $assignTo
     * @return Inquiry | \Exception
     */
    public function assignTo(Inquiry $inquiry, int $assignTo): Inquiry | \Exception
    {
        DB::beginTransaction();

        try {
            if ($inquiry->assigned_to !== $assignTo) {
                $assignToResource = User::find($assignTo);

                $inquiry->update(['assigned_to' => $assignToResource->id]);

                $inquiry->setStatus(InquiryStatusesEnum::ASSIGNED->value);

                $inquiry->comments()->create([
                    'body' => __('messages.inquiries.comments.assign',
                        [
                            'user_full_name' => strtoupper($assignToResource->full_name)
                        ]
                    ),
                    'created_by' => Auth::id()
                ]);
            }
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception;
        }

        DB::commit();

        return $inquiry;
    }

    /**
     * Store a comment for specified inquiry
     *
     * @param Inquiry $inquiry
     * @param array $comment
     * @return \Exception | Model
     */
    public function storeComment(Inquiry $inquiry, array $commentData): \Exception | Model
    {
        DB::beginTransaction();

        try {
            $comment = $inquiry->comments()->create([
                'title' => $commentData['title'] ?? null,
                'body' => $commentData['body'],
                'created_by' => Auth::id()
            ]);

            // To calculate average response time
            if ($commentData['type'] === CommentTypesEnum::QUESTION->value) {
                DB::table('question_response_time')
                    ->insert([
                        'questioner' => Auth::id(),
                        'asked_in' => $comment->id,
                        'inquiry_id' => $inquiry->id,
                        'questioned' => $commentData['to'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
            }

            if ($commentData['type'] === CommentTypesEnum::REPLY->value) {
                DB::table('question_response_time')
                    ->where([
                        'questioner' => $commentData['to'],
                        'inquiry_id' => $inquiry->id,
                        'questioned' => Auth::id(),
                    ])
                    ->update([
                        'replayed_in' => $comment->id,
                        'updated_at' => now()
                    ]);
            }

            if ($commentData['to']) {
                $user = User::find($commentData['to']);

                $user->notify(new UserWasMentioned($inquiry));
            }
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception;
        }

        DB::commit();

        $comment->load('creator');

        return $comment;
    }

    /**
     * change specified inquiry status
     *
     * @param Inquiry $inquiry
     * @param array $statusData
     * @return Inquiry|\Exception
     */
    public function changeStatus(Inquiry $inquiry, array $statusData): Inquiry|\Exception
    {
        DB::beginTransaction();

        try {
            $latestStatus = $inquiry->status;
            $inquiry->setStatus($statusData['status'], $statusData['reason'] ?? null);

            $inquiry->comments()->create([
                'title' => null,
                'body' => trans('messages.inquiries.comments.changed', [
                    'old_status' => strtoupper($latestStatus),
                    'new_status' => strtoupper($statusData['status']),
                    'user_full_name' => Auth::user()->full_name
                ]),
                'created_by' => Auth::id()
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception;
        }

        DB::commit();

        $inquiry->load('statuses');

        return $inquiry;
    }

    /**
     * Perform an action on specified inquiry
     *
     * @param Inquiry $inquiry
     * @param array $actionData
     * @return Inquiry|\Exception
     */
    public function performAction(Inquiry $inquiry, array $actionData): Inquiry|\Exception
    {
        DB::beginTransaction();

        try {

            if ($actionData['action'] == 're_assign') {
                $inquiry->update([
                    'assigned_to' => $actionData['assign_to']
                ]);
            }

            $inquiry->setStatus($actionData['action'], $actionData['reason'] ?? null);

            $inquiry->comments()->create([
                'title' => $actionData['title'] ?? null,
                'body' => trans("messages.inquiries.comments.{$actionData['action']}", [
                    'user_full_name' => $actionData['action'] === 're_assign'
                        ? User::find($actionData['assign_to'])->full_name
                        : Auth::user()->full_name,
                    'reason' => $actionData['reason'],
                ]),
                'created_by' => Auth::id()
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        return $inquiry;
    }

    /**
     * Upload inquiry document
     *
     * @param Inquiry $inquiry
     * @param array $data
     * @return Inquiry|\Exception
     */
    public function uploadDoc(Inquiry $inquiry, array $data)
    {
        DB::beginTransaction();

        try {
            foreach ($data['docs'] as $doc) {
                $path = Storage::disk('inquiries')
                    ->putFileAs(
                        "/",
                        $doc,
                        $inquiry->id . '/' . $doc->getClientOriginalName()
                    );

                $inquiry->addMediaFromDisk($path, 'inquiries')->toMediaCollection($data['doc_type']);

                $inquiry->comments()->create([
                    'body' => trans('messages.inquiries.comments.add_file.' . $data['doc_type'], [
                        'file_name' => $doc->getClientOriginalName()
                    ]),
                    'created_by' => Auth::id()
                ]);
            }

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        $inquiry->loadMedia($data['doc_type']);

        return $inquiry;
    }

    public function calcProfitByUser($userId)
    {
        $inquiries = Inquiry::select('id')
            ->with(['calculations:id,inquiry_id,actual_ordered_price_aed,buying_total_price_aed'])
            ->currentStatus(InquiryStatusesEnum::profitable())
            ->where('assigned_to', $userId)
            ->get();

        $calculations = $inquiries->pluck('calculations')->flatten();

        return $calculations->sum('actual_ordered_price_aed') - $calculations->sum('buying_total_price_aed');

//
//        $calculations = Calculation::where('is_extra', 0)
//            ->with('inquiry.assignedTo')
////            ->select(DB::raw(
////                    "
////                        SUM(qty * quoted_price) as total_quoted,
////                        SUM(qty * buying_price) as total_purchasing,
////                        SUM(qty * actual_ordered_price) as total_actual_ordered_price,
////                        inquiries.*
////                    "
////                )
////            )
//            ->when(isset($this->filters['client_id']), function ($query) {
//                $query->whereHas('inquiry', function ($q) {
//                    $q->where('client_id', $this->filters['client_id']);
//                });
//            })
//            ->orderBy('id', $this->filters['order'] ?? 'desc')
//            ->paginate($this->filters['per_page'] ?? 15);

//        dd($calculations->toArray());
    }
}
