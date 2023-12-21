<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryLocationImage extends Model
{
    use HasFactory;
    protected $table = 'delivery_location_image';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image_url',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
}
