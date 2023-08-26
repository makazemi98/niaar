<?php

namespace App\Models;

use App\Enums\InquiryStatusesEnum;
use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStatus\HasStatuses;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Query\Builder as QueryBuilder;

class Inquiry extends Model
{
    use HasFactory, HasStatuses, HasCreator, SoftDeletes;

    protected $fillable = ['client_id', 'title', 'description', 'remark', 'assigned_to', 'created_by', 'reasign_id', 'question_procurement_to_client', 'stage', 'canceled'];

    public static $genInquiryNum = 402;

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * The inquiry's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function getInquiryNum()
    {
        return $this->id + self::$genInquiryNum;
    }

    public function statuses()
    {
        return $this->morphMany($this->getStatusModelClassName(), 'model', 'model_type', $this->getModelKeyColumnName())->orderBy('created_at', 'ASC');
    }

    public function hasQuestion()
    {
        return $this->question_procurement_to_client ? true : false;
    }
    public function questionProcurementId()
    {
        return $this->question_procurement_to_client;
    }
    public function setQuestion(int|null $id)
    {
        $this->question_procurement_to_client = $id;
        $this->save();
    }
    /**
     * The inquiry's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function setInqStatus(InquiryStatusesEnum $status)
    {
        $this->stage = $status->value;
        $this->save();
    }

    public function setAssignTo($assignTo)
    {
        $this->reasign_id = $assignTo;
        $this->save();
    }

    public function cancel()
    {
        $this->canceled = 1;
        $this->save();
    }

    public function isCanceled()
    {
        return $this->canceled === 1 ? true : false;
    }



    /**
     * The inquiry's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class)->orderBy('id', 'ASC');
    }
    /**
     * The inquiry's files
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->morphMany(Files::class, 'fileable')->orderByDesc('id');;
    }

    /**
     * The inquiry's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    // public function statuses()
    // {
    //     return $this->hasMany(Status::class)->orderBy('id', 'ASC');
    // }


    /**
     * The inquiry's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function add_permissions()
    {
        return $this->hasMany(PermissionsInquiries::class)->orderBy('id', 'ASC');
    }

    public function suppliers()
    {
        return $this->hasMany(SupplierInquiries::class)->orderBy('id', 'ASC');
    }


    /**
     * Inquiry client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id')->withDefault();
    }

    /**
     * The user responsible for handling the inquiry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id')->withDefault();
    }

    /**
     * Inquiry calculations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calculations()
    {
        return $this->hasMany(Calculation::class)->orderByDesc('id')->withTrashed();
    }

    /**
     * Inquiry future dues
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function futureDues()
    {
        return $this->hasMany(FutureDue::class)->orderByDesc('id')->withTrashed();
    }

    /**
     * The inquiry payments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // static public function scopeCurrentStatus(Builder $builder, ...$names)
    // {
    //     $names = is_array($names) ? Arr::flatten($names) : func_get_args();
    //     $builder
    //         ->whereHas(
    //             'statuses',
    //             function (Builder $query) use ($names) {
    //                 $query
    //                     ->whereIn('name', $names)
    //                     ->whereIn(
    //                         'id',
    //                         function (QueryBuilder $query) {
    //                             $query
    //                                 ->select(DB::raw('max(id)'));
    //                                 // ->from(self::getStatusTableName())
    //                                 // ->where('model_type', self::getStatusModelType())
    //                                 // ->whereColumn(self::getModelKeyColumnName(), self::getQualifiedKeyName());
    //                         }
    //                     );
    //             }
    //         );
    // }

    // protected function getStatusTableName(): string
    // {
    //     $modelClass = $this->getStatusModelClassName();

    //     return (new $modelClass)->getTable();
    // }
    // protected function getStatusModelClassName(): string
    // {
    //     return config('model-status.status_model');
    // }
}
