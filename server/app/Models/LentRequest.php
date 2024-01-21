<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LentRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'drone_type_id',
        'number',
        'state',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}

