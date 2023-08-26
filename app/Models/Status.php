<?php

namespace App\Models;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Spatie\ModelStatus\Status as ModelStatus;

class Status extends ModelStatus
{
    use HasFactory, HasCreator;

    /**
     * Get status creator id
     *
     * @return int
     */
    protected static function getCreatorId(): int
    {
        return Auth::id() ?? 1;
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($status) {
            $status->created_by = self::getCreatorId();
        });
    }
}
