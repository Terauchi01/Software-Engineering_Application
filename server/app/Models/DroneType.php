<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroneType extends Model
{
    use HasFactory;
    protected $table = 'drone_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'range',
        'loading_weight',
        'nax_time',
        'number_of_drones',
        'lend_drones_sum',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
