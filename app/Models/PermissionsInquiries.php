<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionsInquiries extends Model
{
    use HasFactory;
    protected $table = 'permissions_inquiries';

    protected $fillable = ['user_id', 'inquiry_id', 'permission_id'];


    public function inquiries()
    {
        return $this->belongsTo(Inquiry::class, 'inquiry_id', 'id')->withDefault();
    }

    public function permissions()
    {
        return $this->belongsTo(Permission::class, 'permission_id', 'id')->withDefault();
    }
}
