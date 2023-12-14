<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;
    protected $table = 'admin_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_name',
        'password',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
