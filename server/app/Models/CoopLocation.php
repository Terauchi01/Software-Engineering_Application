<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoopLocation extends Model
{
    use HasFactory;
    protected $table = 'coop_location';
    protected $primaryKey = 'id';
    protected $fillable = [
        'postal_code',
        'prefecture_id',
        'city_id',
        'town_id',
        'block_id',
        'representative_last_name',
        'representative_first_name',
        'representative_last_name_kana',
        'representative_first_name_kana',
        'license_holder_last_name',
        'license_holder_first_name',
        'license_holder_last_name_kana',
        'license_holder_first_name_kana',
        'license_id',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
