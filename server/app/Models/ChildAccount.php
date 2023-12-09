<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildAccount extends Model
{
    use HasFactory;
    protected $table = 'child_account';

    protected $fillable = [
        'authority',
        'user_name',
        'email_address',
        'password',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
