<?php

namespace App\Models;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calculation extends Model
{
    use HasFactory, HasCreator, SoftDeletes;

    protected $fillable = [
        'inquiry_id',
        'supplier_id',
        'buying_price',
        'buying_currency',
        'buying_total_price_aed',
        'quoted_price',
        'quoted_currency',
        'quoted_price_aed',
        'actual_ordered_price_aed',
        'created_by',
        'qty',
        'is_extra',
        'remark'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Inquiry has supplier throw calculation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Calculation remark
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function remarking()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    /**
     * Calculation description
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function description()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    /**
     * Calculation inquiry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
}
