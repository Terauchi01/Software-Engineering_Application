<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'drone_type_id',
        'number',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}

