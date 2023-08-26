<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\InquiryStatusesEnum;
use App\Enums\PaymentTabsEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, SoftDeletes, InteractsWithMedia, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'password',
        'abbreviation',
        'renewal_date',
        'contact_person',
        'mobile_number',
        'company_name',
        'company_number',
        'contact_name_2',
        'mobile_number_2',
        'company_abbreviation',
        'confidential',
        'avatar',
        'role',
        'cofidential'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get inquiries which assigned to this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignedToInquiries()
    {
        return $this->hasMany(Inquiry::class, 'assigned_to', 'id');
    }

    /**
     * Get inquiries which created by this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdInquiries()
    {
        return $this->hasMany(Inquiry::class, 'created_by', 'id');
    }

    /**
     * Get client inquiries
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'created_by', 'id');
    }

    /**
     * Client confidential
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    // public function confidential()
    // {
    //     return $this->morphOne(Comment::class, 'commentable');
    // }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Get user full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return sprintf(
            '%s %s',
            $this->first_name,
            $this->last_name
        );
    }

    public function getAverageResponseTimeAttribute()
    {
        $avg = DB::table('question_response_time')
            ->selectRaw('CEILING(
                AVG(TIMESTAMPDIFF(SECOND, created_at, updated_at))
            ) as average')
            ->where([
                'questioned' => $this->id,
            ])
            ->first();

        $result = explode(' ', gmdate('d H i', ($avg->average)));

        return [
            'days' => $result[0] - 1,
            'hours' => (int) $result[1],
            'minutes' => (int) $result[2]
        ];
    }

    public function getSuccessRatioAttribute()
    {
        $assigned = Inquiry::where('assigned_to', $this->id)->count();

        $paid = Inquiry::whereHas('statuses', function ($query) {
            $query->where('name', InquiryStatusesEnum::PAID->value);
        })
            ->where('assigned_to', $this->id)
            ->count();

        return $assigned == 0
            ? 0
            : ceil($paid / $assigned);
    }

    public function getBalanceAttribute()
    {
        // return Payment::whereRelation('inquiry', 'client_id', $this->id)
        //     ->selectRaw('
        //             (SUM(credit) - SUM(debit)) AS balance
        //         ')
        //     ->ofTab(PaymentTabsEnum::PAYMENTS->value)
        //     ->first()
        //     ->balance ?? 0;
    }

    public function getPendingQuotationsAttribute()
    {
        return $this->inquiries()
            ->currentStatus(InquiryStatusesEnum::QUOTATION_PREPARED->value)
            ->count();
    }

    public function getOrderRatioAttribute()
    {
        return $this->quated_inquiries == 0
            ? 0
            : round($this->ordered_inquiries / $this->quated_inquiries, PHP_ROUND_HALF_DOWN);
    }

    public function getQuotedInquiriesAttribute()
    {
        return $this->inquiries()
            ->currentStatus(InquiryStatusesEnum::QUOTED->value)
            ->count();
    }

    public function getOrderedInquiriesAttribute()
    {
        return $this->inquiries()
            ->currentStatus(InquiryStatusesEnum::ORDERED->value)
            ->count();
    }

    static function has_permission($premission)
    {
        return User::find(Auth::id())->hasPermissionTo($premission);
    }
}
