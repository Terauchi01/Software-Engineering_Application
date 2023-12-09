<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminInformation extends Model
{
    protected $table = 'admin_information';
    
    protected $fillable = [
        'company_name',
        'representative_name',
        'address',
        'postal_code',
        'prefecture_id',
        'coop_scale',
        'capital_stock',
        'deletion_date',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
