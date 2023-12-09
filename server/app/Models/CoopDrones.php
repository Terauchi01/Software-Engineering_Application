<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoopDrones extends Model
{
    use HasFactory;
    protected $table = 'coop_drones';

    protected $fillable = [
        'drone_type_id',
        'coop_user_id',
        'operating_time',
        'purchase_date',
        'drone_status',
        'possession_or_loan',
        'lending_period',
    ];

    protected $casts = [
        'operating_time' => 'datetime',
        'purchase_date' => 'datetime',
        'lending_period' => 'datetime',
        'deletion_date' => 'datetime',
    ];
}
