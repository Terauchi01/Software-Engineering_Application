<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseInformation extends Model
{
    use HasFactory;
    protected $table = 'license_information';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date_of_issue',
        'date_of_registration',
        'name',
        'birth',
        'conditions',
        'classification',
        'ratings_and_limitations1',
        'ratings_and_limitations2',
        'ratings_and_limitations3',
        'number',
    ];

    protected $casts = [
        'date_of_issue' => 'datetime',
        'date_of_registration' => 'datetime',
        'birth' => 'datetime',
        'deletion_date' => 'datetime',
    ];
}
