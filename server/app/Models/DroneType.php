<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroneType extends Model
{
    use HasFactory;
    protected $table = 'drone_type';

    protected $fillable = [
        'name',
        'drone_spec',
        'number_of_drones',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
