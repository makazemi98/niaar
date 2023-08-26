<?php

namespace App\Models;

use App\Enums\PaymentTabsEnum;
use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, HasCreator, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['past_due'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * The payment inquiry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }

    /**
     * The payment customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The payment supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    /**
     * The payment remark
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function remark()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get past due status
     *
     * @return bool|void
     */
    public function getPastDueAttribute()
    {
        if (isset($this->attributes['tab']) && $this->attributes['tab'] == PaymentTabsEnum::FUTURE_DUES->value) {
            return $this->attributes['date'] < now();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Payment tab scope
     *
     * @param $query
     * @param $tab
     * @return mixed
     */
    public function scopeOfTab($query, $tab)
    {
        return $query->where('tab', $tab);
    }
}
