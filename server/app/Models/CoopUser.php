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
        'bank_id',
        'branch_id',
        'account_type',
        'account_number',
        'account_name',
        'coop_locations_list_id',
        'employees',
        'phone_number',
        'land_or_air',
        'application_status',
        'drone_list_id',
        'amount_of_compensation',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
