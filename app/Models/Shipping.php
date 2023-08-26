<?php

namespace App\Models;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
// use Spatie\ModelStatus\HasStatuses;

class Shipping extends Model
{
    use HasFactory, HasCreator, SoftDeletes;

    protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * The shipping boxes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

    /**
     * The inquiry's files
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function file()
    {
        return $this->morphOne(Files::class, 'fileable')->orderByDesc('id');
    }


    /**
     * The inquiry's files
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function deleteFiles()
    {
        return $this->morphOne(Files::class, 'fileable')->delete();
    }

    /**
     * The shipping comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
