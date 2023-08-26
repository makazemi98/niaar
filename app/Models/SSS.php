<?php

// namespace App\Models;

// use App\Traits\HasCreator;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Database\Eloquent\Model;

// class Status extends Model
// {
//     use HasFactory, HasCreator;

//     protected $fillable = ['label', 'reason', 'by_name', 'inquiry_id', 'created_by'];


//     /**
//      * Get status creator id
//      *
//      * @return int
//      */
//     protected static function getCreatorId(): int
//     {
//         return Auth::id() ?? 1;
//     }

//     /**
//      * The "booted" method of the model.
//      *
//      * @return void
//      */
//     protected static function booted()
//     {
//         static::creating(function ($status) {
//             $status->created_by = self::getCreatorId();
//         });
//     }

//     public function inquiry()
//     {
//         return $this->belongsTo(Inquiry::class)->orderBy('id', 'ASC');
//     }


//     // public function creator()
//     // {
//     //     return $this->belongsTo(User::class, 'created_by', 'id')->withDefault();

//     // }

 
// }
