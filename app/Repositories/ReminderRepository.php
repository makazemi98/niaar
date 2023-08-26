<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ReminderRepositoryInterface;
use App\Models\Reminder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReminderRepository extends BaseRepository implements ReminderRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Reminder::class);
    }

    /**
     * Get authenticated user reminders
     *
     * @param array $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function userReminders(array $filters)
    {
        return $this->model
            ->with(['comment', 'creator'])
            ->where('user_id' , $filters['user_id'] ?? Auth::id())
            ->orWhere('reminder_date', $filters['reminder_date'] ?? now()->format('Y-m-d'))
            ->when(isset($filters['inquiry_id']), function ($query) use($filters) {
                $query->where('inquiry_id', $filters['inquiry_id']);
            })
            ->when(isset($filters['creator']), function ($query) use($filters) {
                $query->where('created_by', $filters['creator']);
            })
            ->orderBy('id', $filters['order'] ?? 'desc')
            ->paginate($filters['per_page'] ?? 15);
    }

    /**
     * Store new reminder
     *
     * @param array $data
     * @return \Exception|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        DB::beginTransaction();

        try {

            $reminder = $this->model->create([
                'user_id' => $data['user_id'],
                'inquiry_id' => $data['inquiry_id'] ?? null,
                'reminder_date' => $data['reminder_date'] ?? null,
                'created_by' => Auth::id()
            ]);

            $reminder->comment()->create([
               'title' => $data['title'],
               'body' => $data['body'],
               'created_by' => Auth::id()
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        $reminder->load(['comment', 'creator']);

        return $reminder;

    }
}
