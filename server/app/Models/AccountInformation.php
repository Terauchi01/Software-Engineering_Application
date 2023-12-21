<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountInformation extends Model
{
    use HasFactory;
    protected $table = 'account_information';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bank_id',
        'branch_id',
        'account_type',
        'account_number',
        'account_name',
        'account_name_kana',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
