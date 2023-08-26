<?php

namespace App\Models;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, HasCreator;

    protected $fillable = ['commentable_type', 'commentable_id', 'title', 'body', 'created_by', 'to', 'type'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get the parent commentable
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get the parent commentable
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function reply()
    {
        return $this->belongsTo(User::class, 'to', 'id')->withDefault();
    }
}
