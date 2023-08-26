<?php

namespace App\Http\Controllers\Inquiry;

use App\Enums\CommentTypesEnum;
use App\Enums\InquiryDocsCollectionEnum;
use App\Enums\InquiryStatusesEnum;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Calculation\StoreCalculationRequest;
use App\Http\Requests\FutureDue\StoreFutureDueRequest;
use App\Http\Requests\Inquiry\ChangeQutedOrRejectedRequest;
use App\Http\Requests\Inquiry\AssignRequest;
use App\Http\Requests\Inquiry\ChangeStatusRequest;
use App\Http\Requests\Inquiry\PerformActionRequest;
use App\Http\Requests\Inquiry\ReAssignRequest;
use App\Http\Requests\Inquiry\StoreCommentRequest;
use App\Http\Requests\Inquiry\StoreInquiryRequest;
use App\Http\Requests\Inquiry\StoreSuppliersRequest;
use App\Http\Requests\Inquiry\UploadDocRequest;
use App\Http\Requests\Reminder\StoreReminderRequest;
use App\Http\Services\File\FileService;
use App\Http\Services\Image\ImageService;
// use App\Http\Resources\Comments\CommentResource;
// use App\Http\Resources\Inquiry\InquiryCollection;
// use App\Http\Resources\Inquiry\InquiryResource;
use App\Interfaces\Repositories\InquiryRepositoryInterface;
use App\Models\Calculation;
use App\Models\Inquiry;
use App\Models\Files;
use App\Models\FutureDue;
use App\Models\QuestionResponseTime;
use App\Models\Reminder;
use App\Models\Supplier;
use App\Models\TeamMembers;
use App\Models\User;
use App\Repositories\InquiryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class InquiryController extends Controller
{
    public function __construct(protected InquiryRepository $inquiryRepository)
    {
        // $this->middleware(['role:manager|team-leader']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return InquiryCollection
     */
    public function getInquiry(Inquiry $inquiry)
    {
        $user = Auth::user();

        $inquiry->load([
            'client',
            'assignedTo',
            'comments',
            'statuses',
            'statuses.creator',
        ]);
        $status = $inquiry->statuses;
        $users = [];
        $suppliers = [];
        $permissionToAnswer = false;

        if (!User::has_permission('user:access_inquiry_comment_show_confidential')) {
            $inquiry->comments = $inquiry->comments->whereNotIn('type', [CommentTypesEnum::CONFIDENTIAL->value]);
        }

        if (User::has_permission('action:inquiry_re_assign') || in_array($inquiry->stage, [InquiryStatusesEnum::OPEN->value])) {
            $users =  User::whereHas('roles', function ($query) {
                return $query->whereIn('name', [RolesEnum::PROCUREMENT->value]);
            })->get();
        }

        if ($inquiry->stage === InquiryStatusesEnum::ON_PROGRESS->value && $user->hasRole(['manager', 'team-leader', 'procurement'])) {
            $suppliers = Supplier::all();
        }

        if ($inquiry->hasQuestion() && $inquiry->client_id === Auth::id()) {
            $permissionToAnswer = true;
        }


        return view('pages.manager.ticket.ticket', compact('inquiry', 'status', 'users', 'suppliers', 'permissionToAnswer'));
    }

    public function addComment(Inquiry $inquiry, StoreCommentRequest $request)
    {
        $inputs = $request->all();
        $inquiry->comments()->create([
            ...$inputs,
            'created_by' => Auth::id(),
            'type' =>  CommentTypesEnum::COMMENT->value
        ]);

        return redirect()->back();
    }

    public function addQuestion(Inquiry $inquiry, StoreCommentRequest $request)
    {
        $inputs = $request->all();
        DB::beginTransaction();

        try {

            $inquiry->setQuestion(Auth::id());
            // dd($inquiry->client->id);

            $comment = $inquiry->comments()->create([
                ...$inputs,
                'created_by' => Auth::id(),
                'type' => CommentTypesEnum::QUESTION->value,
                'to' => $inquiry->client->id

            ]);

            $questionResponseTime = QuestionResponseTime::create([
                'questioner' => Auth::id(),
                'asked_in' => $comment->id,
                'inquiry_id' => $inquiry->id,
                'questioned' => $inquiry->client->id,
                // 'created_at' => now(),
                // 'updated_at' => now()
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
        }

        DB::commit();
        return redirect()->back();
    }



    public function answerQuestion(Inquiry $inquiry, StoreCommentRequest $request)
    {
        if ($inquiry->client_id !== Auth::id() && $inquiry->hasQuestion() === false) {
            return redirect()->back();
        }
        DB::beginTransaction();

        try {
            $inputs = $request->all();
            $procurementId = $inquiry->questionProcurementId();
            $inquiry->setQuestion(null);

            $comment = $inquiry->comments()->create([
                ...$inputs,
                'created_by' => Auth::id(),
                'type' => CommentTypesEnum::REPLY->value,
                'to' => $procurementId

            ]);

            DB::table('question_response_time')
                ->where([
                    'questioner' => $procurementId,
                    'inquiry_id' => $inquiry->id,
                    'questioned' => Auth::id(),
                ])
                ->update([
                    'replayed_in' => $comment->id,
                    'updated_at' => now()
                ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();
        return redirect()->back();
    }

    public function addConfidential(Inquiry $inquiry, StoreCommentRequest $request)
    {
        $inputs = $request->all();
        $inquiry->comments()->create([
            ...$inputs,
            'created_by' => Auth::id(),
            'type' => CommentTypesEnum::CONFIDENTIAL->value,
        ]);

        return redirect()->back();
    }

    public function addReminder(Inquiry $inquiry, StoreReminderRequest $request)
    {
        $inputs = $request->all();
        $inquiry->reminders()->create([
            ...$inputs,
            'user_id' => Auth::id(),
            'inquiry_id' => $inquiry->id,
        ]);

        return redirect()->back();
    }

    public function quotedOrRejected(Inquiry $inquiry, ChangeQutedOrRejectedRequest $request)
    {
        $inputs = $request->all();
        if ($inquiry->stage !== InquiryStatusesEnum::QUOTATION_PREPARED->value) {
            return redirect()->back();
        }
        DB::beginTransaction();

        try {
            $user = Auth::user();
            $endStatus = $inputs['status'] === '0' ? InquiryStatusesEnum::ON_PROGRESS : InquiryStatusesEnum::QUOTED;

            $inquiry->setInqStatus($endStatus);

            if ($inputs['status'] === '0') {

                // $inquiry->statuses()->create([
                //     'label' => InquiryStatusesEnum::REJECTED->value,
                //     'reason' => 'Change Status to ' . InquiryStatusesEnum::REJECTED->value,
                //     'by_name' => $user->full_name,
                //     'inquiry_id' => $inquiry->id,
                // ]);
                $inquiry->setStatus(InquiryStatusesEnum::REJECTED->value);

                $inquiry->comments()->create([
                    'body' => $inputs['reason'],
                    'created_by' => Auth::id(),
                    'type' => CommentTypesEnum::CONFIDENTIAL->value
                ]);

                $inquiry->suppliers()->delete([
                    'inquiry_id' => $inquiry->id,
                ]);
            } else {
                if ($inputs['reason']) {
                    $inquiry->comments()->create([
                        'body' => $inputs['reason'],
                        'created_by' => Auth::id(),
                        'type' => CommentTypesEnum::CONFIDENTIAL->value
                    ]);
                }
            }

            // $inquiry->statuses()->create([
            //     'label' => $endStatus->value,
            //     'reason' => 'Change Status to ' . $endStatus->value,
            //     'by_name' => $user->full_name,
            //     'inquiry_id' => $inquiry->id,
            // ]);
            $inquiry->setStatus($endStatus->value);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }
    public function addSuppliers(Inquiry $inquiry, StoreSuppliersRequest $request)
    {
        $inputs = $request->all();
        DB::beginTransaction();

        try {
            $user = Auth::user();

            $inquiry->setInqStatus(InquiryStatusesEnum::QUOTATION_PREPARED);

            // $inquiry->statuses()->create([
            //     'label' => InquiryStatusesEnum::QUOTATION_PREPARED->value,
            //     'reason' => 'Change Status to ' . InquiryStatusesEnum::QUOTATION_PREPARED->value,
            //     'by_name' => $user->full_name,
            //     'inquiry_id' => $inquiry->id,
            // ]);
            $inquiry->setStatus(InquiryStatusesEnum::QUOTATION_PREPARED->value);


            $inquiry->comments()->create([
                'body' => 'Prepared The Quotation',
                'created_by' => Auth::id(),
                'type' => CommentTypesEnum::COMMENT->value
            ]);

            if (isset($inputs['details'])) {
                $inquiry->comments()->create([
                    'body' => $inputs['details'],
                    'created_by' => Auth::id(),
                    'type' => CommentTypesEnum::CONFIDENTIAL->value
                ]);
            }

            foreach ($inputs['suppliers'] as  $suppliersValue) {
                $inquiry->suppliers()->create([
                    'inquiry_id' => $inquiry->id,
                    'supplier_id' => $suppliersValue,
                ]);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    public function uploadDoc(Inquiry $inquiry, UploadDocRequest $request, FileService $fileService)
    {
        $inputs = $request->all();
        DB::beginTransaction();

        try {

            if (isset($inputs['docs'])) {
                foreach ($inputs['docs'] as $key => $doc) {
                    $fileService->setExclusiveDirectory('app' . DIRECTORY_SEPARATOR . 'inquiries' . DIRECTORY_SEPARATOR . 'files');
                    $fileService->setFileSize($doc);
                    $fileSize = $fileService->getFileSize();
                    // $result = $fileService->moveToPublic($doc);
                    $path = $fileService->moveToStorage($doc);
                    $fileFormat = $fileService->getFileFormat();

                    if ($path === false) {
                        return redirect()->back()->with('error', 'There was an error uploading the docs');
                    }

                    $inquiry->files()->create([
                        'url' => $path,
                        'type' => $inputs['type'] == InquiryDocsCollectionEnum::DOCS->value ?  InquiryDocsCollectionEnum::DOCS->value : InquiryDocsCollectionEnum::CONFIDENTIAL->value,
                        // 'inquiry_id' => $inquiry->id,
                        'name' => $doc->getClientOriginalName(),
                        'size' => $fileSize,
                        'created_by' => Auth::id(),
                    ]);

                    $inquiry->comments()->create([
                        'body' => '<span style="font-weight: bold !important;color:#0b44ff;">' . $doc->getClientOriginalName() . '</span> added to ' . ($inputs['type'] == InquiryDocsCollectionEnum::DOCS->value ? "DOCS" : "CONFIDENTIAL") . ' folder',
                        'created_by' => Auth::id(),
                        'type' => $inputs['type'] == CommentTypesEnum::CONFIDENTIAL->value ?  CommentTypesEnum::CONFIDENTIAL->value : CommentTypesEnum::COMMENT->value,
                    ]);
                }
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();


        return redirect()->back();
    }

    public function changeStatus(Inquiry $inquiry, ChangeStatusRequest $request)
    {
        $inputs = $request->all();

        if ($inquiry->stage == $inputs['stage']) {
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            $permission = Permission::findById($inputs['stage'], 'web');
            $inputs['stage'] = str_replace('update-status:', '', strval($permission->name));

            $statusStage = array_search($inputs['stage'], InquiryStatusesEnum::manualUpdateStatusByUser());

            if (!isset($statusStage)) {
                return redirect()->back();
            }

            $inquiry->stage = InquiryStatusesEnum::manualUpdateStatusByUser()[$statusStage];
            $inquiry->save();
            // $inquiry->statuses()->create([
            //     'label' => InquiryStatusesEnum::manualUpdateStatusByUser()[$statusStage],
            //     'reason' => $inputs['reason'],
            //     'by_name' => Auth::user()->full_name,
            //     'inquiry_id' => $inquiry->id,
            //     // 'created_by' => Auth::id(),
            // ]);
            $inquiry->setStatus(InquiryStatusesEnum::manualUpdateStatusByUser()[$statusStage]);


            $inquiry->comments()->create([
                'body' => 'Status Change To <span style="font-weight: bold !important;color:#0b44ff;">' . str_replace('_', ' ', strval(InquiryStatusesEnum::manualUpdateStatusByUser()[$statusStage])) . '</span>  <br /> <br />' . $inputs['reason'],
                'created_by' => Auth::id(),
                'type' => CommentTypesEnum::COMMENT->value
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return InquiryCollection
     */
    public function getDocsInquiry(Inquiry $inquiry)
    {
        $inquiry->load([
            'client',
            'assignedTo',
            'statuses.creator',
        ]);

        $status = $inquiry->statuses;
        $docs = $inquiry->files->where("type", InquiryDocsCollectionEnum::DOCS->value);
        return view('pages.manager.ticket.ticket', compact('inquiry', 'docs', 'status'));
    }

    public function getCalculationInquiry(Inquiry $inquiry)
    {
        $inquiry->load([
            'client',
            'assignedTo',
            'statuses.creator',
            'suppliers.supplier',
        ]);

        $status = $inquiry->statuses;
        $cleint = $inquiry->client;
        $suppliers = $inquiry->suppliers;
        $calculations = $inquiry->calculations;
        $futureDues = $inquiry->futureDues;

        return view('pages.manager.ticket.ticket', compact('inquiry', 'status', 'cleint', 'suppliers', 'calculations', 'futureDues'));
    }

    public function getReminderInquiry(Inquiry $inquiry)
    {
        $inquiry->load([
            'client',
            'assignedTo',
            'statuses.creator',
            'suppliers.supplier',
        ]);

        $status = $inquiry->statuses;
        $cleint = $inquiry->client;
        $suppliers = $inquiry->suppliers;
        $userId = Auth::id();
        $reminders = Reminder::where('inquiry_id', $inquiry->id)->where('user_id', $userId)->get();

        return view('pages.manager.ticket.ticket', compact('inquiry', 'status', 'reminders'));
    }

    public function deleteReminder(Reminder $reminder)
    {

        $reminder->delete();

        return redirect()->back();
    }

    public function deleteFiles(Files $file)
    {

        $file->delete();

        return redirect()->back();
    }


    public function storeCalculation(Inquiry $inquiry, StoreCalculationRequest $request)
    {
        $inputs = $request->all();

        DB::beginTransaction();
        try {
            $calculation = Calculation::create([
                'inquiry_id' => $inquiry->id,
                'supplier_id' => $inputs['supplier_id'],
                'buying_price' => $inputs['buying_price'],
                'buying_currency' => strtolower($inputs['buying_currency']),
                'buying_total_price_aed' => $inputs['buying_total_price_aed'],
                'quoted_price' => $inputs['quoted_price'],
                'quoted_currency' => strtolower($inputs['quoted_currency']),
                'quoted_price_aed' => $inputs['quoted_price_aed'],
                'qty' => $inputs['qty'],
                'actual_ordered_price_aed' => $inputs['actual_ordered_price_aed'],
                'created_by' => Auth::id(),
                'remark' => $inputs['remark'] ?? null,
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    public function storeFutureDues(Inquiry $inquiry, StoreFutureDueRequest $request)
    {
        $inputs = $request->all();

        DB::beginTransaction();
        try {
            $futureDues = FutureDue::create([
                'inquiry_id' => $inquiry->id,
                'bill_to' => $inputs['bill_to'],
                'payee_name' => $inputs['payee_name'],
                'payable_amount' => $inputs['payable_amount'],
                'receivable_amount' => $inputs['receivable_amount'],
                'currency' => strtolower($inputs['currency']),
                'due_date' => $inputs['due_date'],
                'is_paid' => isset($inputs['is_paid']) ? 1 : 0,
                'description' => $inputs['description'],
                'created_by' => Auth::id()
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }
    public function downloadFileDocs(Files $file)
    {
        if (Storage::exists(trim($file->url, 'app/'))) {
            return Storage::download(trim($file->url, 'app/'));
        }
        return redirect()->back();
    }
    public function downloadFileConfidential(Files $file)
    {
        if (Storage::exists(trim($file->url, 'app/'))) {
            return Storage::download(trim($file->url, 'app/'));
        }
        return redirect()->back();
    }
    public function getConfidentialInquiry(Inquiry $inquiry)
    {
        $inquiry->load([
            'client',
            'assignedTo',
            'statuses.creator',

        ]);
        $status = $inquiry->statuses;

        $docs = $inquiry->files->where("type", \App\Enums\InquiryDocsCollectionEnum::CONFIDENTIAL->value);
        return view('pages.manager.ticket.ticket', compact('inquiry', 'docs', 'status'));
    }
    public function inquiriesList(Request $request)
    {
        $filters = $request->toArray();

        $inquiries = Inquiry::with([
            'client',
            'assignedTo',
            'creator'
        ])
            ->when(isset($filters['client']), function ($query) use ($filters) {
                $query->whereHas('client', function ($q) use ($filters) {
                    $q->where(
                        DB::raw('CONCAT_WS(" ", first_name, last_name)'),
                        'LIKE',
                        "%{$filters['client']}%"
                    );
                });
            })
            // This filter used in accounting profit tab
            ->when(isset($filters['client_id']), function ($query) use ($filters) {
                $query->where('client_id', $filters['client_id']);
            })
            ->when(isset($filters['assigned_to']), function ($query) use ($filters) {
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
                function ($query) use ($filters) {
                    $query->whereDate('created_at', '>=', $filters['from_created_at']);
                }
            )
            ->when(
                !isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use ($filters) {
                    $query->whereDate('created_at', '<=', $filters['to_created_at']);
                }
            )
            ->when(
                isset($filters['from_created_at']) && isset($filters['to_created_at']),
                function ($query) use ($filters) {
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
            ->orderBy('id', isset($filters['order']) && $filters['order'] !== '0' ? 'desc' : 'desc')->get();
        // ->paginate($filters['per_page'] ?? 15);


        return view('pages.manager.inquiries.list', compact('inquiries'));
    }

    public function createInquiries()
    {

        $user = Auth::user();
        $users = User::with("roles")->whereHas("roles", function ($role) {
            $role->where('name', RolesEnum::CLIENT->value);
        })->get();

        if ($lastItem = Inquiry::latest()->first()) {
            $ni_num =  Inquiry::latest()->first()->id + Inquiry::$genInquiryNum + 1;
        } else {
            $inquiryStmt = DB::select("SHOW TABLE STATUS LIKE 'inquiries'");
            $nextPrimaryKeyId = $inquiryStmt[0]->Auto_increment;
            $ni_num =  $nextPrimaryKeyId + Inquiry::$genInquiryNum;
        }
        if ($user->hasRole(['client'])) {
            return view('pages.manager.inquiries.create-client', compact('ni_num'));
        } else {
            return view('pages.manager.inquiries.create', compact('ni_num', 'users'));
        }
    }

    public function storeInquiries(StoreInquiryRequest $request, FileService $fileService)
    {

        $inquiryData = $request->all();
        DB::beginTransaction();
        $user = Auth::user();

        try {
            $inquiry = Inquiry::create([
                'client_id' => $user->hasRole('client') ? $user->id : $inquiryData['client_id'],
                'title' => $inquiryData['title'],
                'description' => $inquiryData['description'],
                'remark' => $inquiryData['remark'] ?? null,
                'created_by' => $user->id,
                'assigned_to' => null,
                'stage' =>  $user->hasRole('client') ? InquiryStatusesEnum::BY_CLIENT_OPEN->value : InquiryStatusesEnum::OPEN->value
            ]);


            if ($request->hasFile('docs')) {
                if (isset($inquiryData['docs'])) {
                    foreach ($inquiryData['docs'] as $key => $doc) {
                        $fileService->setExclusiveDirectory('app' . DIRECTORY_SEPARATOR . 'inquiries' . DIRECTORY_SEPARATOR . 'files');
                        $fileService->setFileSize($doc);
                        $fileSize = $fileService->getFileSize();
                        // $result = $fileService->moveToPublic($doc);
                        $path = $fileService->moveToStorage($doc);
                        $fileFormat = $fileService->getFileFormat();

                        if ($path === false) {
                            return redirect()->back()->with('error', 'There was an error uploading the docs');
                        }

                        $inquiry->files()->create([
                            'url' => $path,
                            'type' => InquiryDocsCollectionEnum::DOCS,
                            // 'inquiry_id' => $inquiry->id,
                            'name' => $doc->getClientOriginalName(),
                            'size' => $fileSize,
                            'created_by' => Auth::id(),
                        ]);

                        $inquiry->comments()->create([
                            'body' => '<span style="font-weight: bold !important;color:#0b44ff;">' . $doc->getClientOriginalName() . '</span> added to DOCS folder',
                            'created_by' => Auth::id(),
                            'type' => CommentTypesEnum::COMMENT->value
                        ]);
                    }
                }
            }
            if (!$user->hasRole('client')) {
                // $inquiry->statuses()->create([
                //     'label' =>  InquiryStatusesEnum::OPEN->value,
                //     'reason' => 'create inquiry by ' . Auth::user()->full_name,
                //     'by_name' => Auth::user()->full_name,
                //     'inquiry_id' => $inquiry->id,
                //     // 'created_by' => Auth::id(),
                // ]);
                $inquiry->setStatus(InquiryStatusesEnum::OPEN->value);
            }


            $teamMember = TeamMembers::create([
                'user' => $user->hasRole('client') ? $user->id : $inquiryData['client_id'],
                'inquiry' => $inquiry->id,
                'role' => RolesEnum::CLIENT->value
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        return redirect()->route('inquiries.list');
    }


    /**
     * Assign an inquiry to a user
     *
     * @param AssignRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function assign(Inquiry $inquiry, AssignRequest $request)
    {
        $assignTo = $request->input('assign_to');
        $body = $request->input('body');
        $isReassign = !empty($request->input('re_assign'));
        $user = Auth::user();

        DB::beginTransaction();
        try {

            // $inquiry->status === InquiryStatusesEnum::OPEN->value
            $pervUser = $inquiry->assigned_to;
            if ($inquiry->assigned_to !== (int)$assignTo) {
                if ($isReassign && $user->hasRole(['procurement', 'accountant'])) {
                    if (!empty($inquiry->reasign_id)) return redirect()->back();

                    $assignToResource = User::find($assignTo);
                    $inquiry->update(['reasign_id' => $assignToResource->id]);
                    $inquiry->comments()->create([
                        'body' =>  'Re-Assign Request the inquiry By <span style="font-weight: bold !important;color:#0b44ff;">' . $user->full_name . '</span> To <span style="font-weight: bold !important;color:#0b44ff;">' . $assignToResource->full_name . '</span> <br/><br/>' . $body,
                        'created_by' => Auth::id(),
                        'type' => CommentTypesEnum::CONFIDENTIAL->value
                    ]);
                } else {
                    $assignToResource = User::find($assignTo);

                    $inquiry->update(['assigned_to' => $assignToResource->id]);

                    $inquiry->setInqStatus(InquiryStatusesEnum::ASSIGNED);


                    if ($isReassign) $inquiry->assignedTo(null);

                    // $inquiry->statuses()->create([
                    //     'label' => InquiryStatusesEnum::ASSIGNED->value,
                    //     'reason' => ($isReassign ? 'Re-Assign To ' : 'Assign To ') . $assignToResource->full_name,
                    //     'by_name' => Auth::user()->full_name,
                    //     'inquiry_id' => $inquiry->id,
                    // ]);
                    $inquiry->setStatus(InquiryStatusesEnum::ASSIGNED->value);



                    $inquiry->comments()->create([
                        'body' => ($isReassign ? 'Re-Assign ' : 'Assigned ') . 'the inquiry to <span style="font-weight: bold !important;color:#0b44ff;">' . $assignToResource->full_name . '</span> ' . ($isReassign ? ' <br/><br/>' . $body : ''),
                        'created_by' => Auth::id(),
                        'type' => CommentTypesEnum::COMMENT->value
                    ]);
                    if ($isReassign) {
                        TeamMembers::create([
                            'user' => $assignToResource->id,
                            'inquiry' => $inquiry->id,
                            'role' => RolesEnum::CLIENT->value
                        ]);
                        TeamMembers::where('inquiry', $inquiry->id)->where('user', $pervUser)->delete();
                    }
                }
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    public function confirmReassign(Inquiry $inquiry, ReAssignRequest $request)
    {

        $inputs = $request->input('is_accept');
        $is_accept = ((int) $inputs) === 1;

        DB::beginTransaction();
        try {
            if (empty($inquiry->reasign_id)) return redirect()->back();
            $pervUser = $inquiry->assigned_to;
            if ($is_accept === true) {
                if ($inquiry->assigned_to === $inquiry->reasign_id) return redirect()->back();
                $assignToResource = User::find($inquiry->reasign_id);
                $inquiry->update(['assigned_to' => $assignToResource->id]);
                $inquiry->setInqStatus(InquiryStatusesEnum::ASSIGNED);
                // $inquiry->statuses()->create([
                //     'label' => InquiryStatusesEnum::ASSIGNED->value,
                //     'reason' => 'Re-Assign To ' . $assignToResource->full_name,
                //     'by_name' => Auth::user()->full_name,
                //     'inquiry_id' => $inquiry->id,
                // ]);
                $inquiry->setStatus(InquiryStatusesEnum::ASSIGNED->value);


                $inquiry->comments()->create([
                    'body' => 'Re-Assign the inquiry to <span style="font-weight: bold !important;color:#0b44ff;">' . $assignToResource->full_name . '</span> ',
                    'created_by' => Auth::id(),
                    'type' => CommentTypesEnum::COMMENT->value
                ]);

                TeamMembers::create([
                    'user' => $assignToResource->id,
                    'inquiry' => $inquiry->id,
                    'role' => RolesEnum::CLIENT->value
                ]);
                TeamMembers::where('inquiry', $inquiry->id)->where('user', $pervUser)->delete();
            } else {
                $assigned = User::find($pervUser);
                $inquiry->comments()->create([
                    'body' => 'Rejected Re-Assign the inquiry ( Requested By <span style="font-weight: bold !important;color:#0b44ff;">' . $assigned->full_name . '</span> ) ',
                    'created_by' => Auth::id(),
                    'type' => CommentTypesEnum::CONFIDENTIAL->value
                ]);
            }
            $inquiry->setAssignTo(null);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    public function reassign(Inquiry $inquiry, AssignRequest $request)
    {
        $assignTo = $request->input('assign_to');
        $body = $request->input('body');
        $isReassign = !empty($request->input('re_assign'));

        DB::beginTransaction();

        try {
            // $inquiry->status === InquiryStatusesEnum::OPEN->value
            $pervUser = $inquiry->assigned_to;
            if ($inquiry->assigned_to !== (int)$assignTo) {
                $assignToResource = User::find($assignTo);

                $inquiry->update(['assigned_to' => $assignToResource->id]);

                $inquiry->setInqStatus(InquiryStatusesEnum::ASSIGNED);

                // $inquiry->statuses()->create([
                //     'label' => InquiryStatusesEnum::ASSIGNED->value,
                //     'reason' => ($isReassign ? 'Re-Assign To ' : 'Assign To ') . $assignToResource->full_name,
                //     'by_name' => Auth::user()->full_name,
                //     'inquiry_id' => $inquiry->id,
                // ]);
                $inquiry->setStatus(InquiryStatusesEnum::ASSIGNED->value);


                $inquiry->comments()->create([
                    'body' => ($isReassign ? 'Re-Assign ' : 'Assigned ') . 'the inquiry to <span style="font-weight: bold !important;color:#0b44ff;">' . $assignToResource->full_name . '</span> ' . ($isReassign ? ' <br/><br/>' . $body : ''),
                    'created_by' => Auth::id(),
                    'type' => CommentTypesEnum::COMMENT->value
                ]);
                if ($isReassign) {
                    $teamMember = TeamMembers::create([
                        'user' => $assignToResource->id,
                        'inquiry' => $inquiry->id,
                        'role' => RolesEnum::CLIENT->value
                    ]);
                    TeamMembers::where('inquiry', $inquiry->id)->where('user', $pervUser->id)->delete();
                }
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    public function chnageStatusToOpen(Inquiry $inquiry)
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();

            $inquiry->setInqStatus(InquiryStatusesEnum::OPEN);

            // $inquiry->statuses()->create([
            //     'label' => InquiryStatusesEnum::OPEN->value,
            //     'reason' => 'Opened By ' . $user->full_name,
            //     'by_name' => $user->full_name,
            //     'inquiry_id' => $inquiry->id,
            // ]);
            $inquiry->setStatus(InquiryStatusesEnum::OPEN->value);

            $inquiry->comments()->create([
                'body' => 'Opened the inquiry By <span style="font-weight: bold !important;color:#0b44ff;">' . $user->full_name . '</span> ',
                'created_by' => $user->id,
                'type' => CommentTypesEnum::COMMENT->value
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    public function inquiriesCancel(Inquiry $inquiry)
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();
            $inquiry->cancel();

            $inquiry->comments()->create([
                'body' => 'Canceled the inquiry By <span style="font-weight: bold !important;color:#0b44ff;">' . $user->full_name . '</span> ',
                'created_by' => $user->id,
                'type' => CommentTypesEnum::COMMENT->value
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    public function start(Inquiry $inquiry)
    {
        DB::beginTransaction();

        try {
            $user = Auth::user();

            $inquiry->setInqStatus(InquiryStatusesEnum::ON_PROGRESS);

            // $inquiry->statuses()->create([
            //     'label' => InquiryStatusesEnum::ON_PROGRESS->value,
            //     'reason' => 'Started By ' . $user->full_name,
            //     'by_name' => $user->full_name,
            //     'inquiry_id' => $inquiry->id,
            // ]);
            $inquiry->setStatus(InquiryStatusesEnum::ON_PROGRESS->value);


            $inquiry->comments()->create([
                'body' => 'Started the inquiry to <span style="font-weight: bold !important;color:#0b44ff;">' . $user->full_name . '</span> ',
                'created_by' => Auth::id(),
                'type' => CommentTypesEnum::COMMENT->value
            ]);

            // $inquiry->add_permissions()->delete([
            //     'user_id' => $user->id,
            //     'inquiry_id' => $inquiry->id,
            //     'permission_id' => Permission::findByName('action:inquiry_start', 'web')->id,
            // ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);

            return $exception;
        }

        DB::commit();

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInquiryRequest $request
     * @return InquiryResource | Response
     */
    public function store(StoreInquiryRequest $request)
    {
        // $result = $this->inquiryRepository->storeInquiry($request->toArray());

        // if ($result instanceof \Exception) {
        //     Log::channel('inquiries')
        //         ->error($result);

        //     return response()->json(
        //         [
        //             'message' => __('messages.inquiries.create.failed')
        //         ],
        //         Response::HTTP_INTERNAL_SERVER_ERROR
        //     );
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param Inquiry $inquiry
     * @return InquiryResource
     */
    public function show(Inquiry $inquiry)
    {
        $inquiry->load([
            'client',
            'assignedTo'
        ]);

        // return new InquiryResource($inquiry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Assign an inquiry to a user
     *
     * @param AssignRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function assign(Inquiry $inquiry, AssignRequest $request)
    // {
    //     $result = $this->inquiryRepository
    //         ->assignTo($inquiry, $request->input('assign_to'));

    //     $message = trans('messages.inquiries.assign.success');
    //     $statusCode = Response::HTTP_ACCEPTED;

    //     if ($result instanceof \Exception) {
    //         Log::channel('inquiries')
    //             ->error($result);

    //         $message = trans('messages.inquiries.assign.failed');
    //         $statusCode =  Response::HTTP_INTERNAL_SERVER_ERROR;
    //     }

    //     return response()->json(['message' => $message], $statusCode);
    // }

    /**
     * Get specified inquiry logs
     *
     * @param Inquiry $inquiry
     * @return InquiryResource
     */
    public function log(Inquiry $inquiry)
    {
        $inquiry->load([
            'comments.creator',
            'client',
            'assignedTo',
            'creator'
        ]);

        // return new InquiryResource($inquiry);
    }

    /**
     * @param StoreCommentRequest $request
     * @param Inquiry $inquiry
     * @return CommentResource
     */
    public function storeComment(StoreCommentRequest $request, Inquiry $inquiry)
    {
        $result = $this->inquiryRepository->storeComment($inquiry, $request->all());

        if ($result instanceof \Exception) {
            return response()->json([
                'message' => 'Store comment error. Please try again.'
            ], 500);
        }

        // return new CommentResource($result);
    }

    /**
     * Perform re_assign or cancel action on an inquiry
     *
     * @param Inquiry $inquiry
     * @param PerformActionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function performAction(Inquiry $inquiry, PerformActionRequest $request)
    {
        $result = $this->inquiryRepository->performAction($inquiry, $request->all());

        $message = trans("messages.inquiries.actions.{$request->input('action')}.success");
        $statusCode =  Response::HTTP_ACCEPTED;

        if ($result instanceof \Exception) {
            Log::channel('inquiries')
                ->error($result);

            $message = trans("messages.inquiries.actions.{$request->input('action')}.failed");
            $statusCode =  Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json(['message' => $message], $statusCode);
    }
}
