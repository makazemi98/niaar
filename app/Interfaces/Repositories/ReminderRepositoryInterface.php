<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ReminderRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get authenticated user reminders
     *
     * @param array $filters
     * @return Collection
     */
    public function userReminders(array $filters);
}
