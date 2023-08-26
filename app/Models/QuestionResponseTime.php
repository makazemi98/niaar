<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionResponseTime extends Model
{
    use HasFactory;
    protected $table = 'question_response_time';
    protected $fillable = ['questioner', 'asked_in', 'inquiry_id', 'questioned'];

}
