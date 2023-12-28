<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoopUser extends Model
{
    use HasFactory;
    protected $table = 'coop_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email_address',
        'password',
        'coop_name',
        'representative_last_name',
        'representative_first_name',
        'representative_last_name_kana',
        'representative_first_name_kana',
        'license_information_id',
        'account_information_id',
        'employees',
        'phone_number',
        'land_or_air',
        'application_status',
        'child_status',
        'pair_id',
        'pay_status',
        'amount_of_compensation',
    ];
    protected $hidden = [
        'password' => 'hashed',
        'password',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
    public function license()
    {
        return $this->belongsTo(LicenseInformation::class);
    }
    public function account_information()
    {
        return $this->belongsTo(AccountInformation::class);
    }
}
