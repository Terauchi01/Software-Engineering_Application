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
        'office_name',
        'postal_code',
        'prefecture_id',
        'city_id',
        'town',
        'block',
        'representative_last_name',
        'representative_first_name',
        'representative_last_name_kana',
        'representative_first_name_kana',
        'license_holder_name',
        // 'license_holder_first_name',
        // 'license_holder_last_name_kana',
        // 'license_holder_first_name_kana',
        'license_id',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
    public function coop_user()
    {
        return $this->belongsTo(CoopUser::class);
    }
    public function license()
    {
        return $this->belongsTo(LicenseInformation::class);
    }
}
