<?php

namespace App\Models;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FutureDue extends Model
{
    use HasFactory, HasCreator, SoftDeletes;

    protected $fillable = [
        'inquiry_id',
        'bill_to',
        'payee_name',
        'payable_amount',
        'receivable_amount',
        'currency',
        'due_date',
        'is_paid',
        'description',
        'created_by',
    ];
}
