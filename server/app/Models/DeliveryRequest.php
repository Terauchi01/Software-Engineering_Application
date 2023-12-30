<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRequest extends Model
{
    use HasFactory;
    protected $table = 'delivery_request';
    protected $primaryKey = 'id';
    protected $fillable = [
        'delivery_destination_id',
        'user_id',
        'collection_company_id',
        'intermediate_delivery_company_id',
        'delivery_company_id',
        'collection_company_remuneration',
        'intermediate_delivery_company_remuneration',
        'delivery_company_remuneration',
        'delivery_status',
        'request_date',
        'delivery_date',
    ];

    protected $casts = [
        'request_date' => 'datetime',
        'delivery_date' => 'datetime',
        'deletion_date' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function coop_user()
    {
        return $this->belongsTo(CoopUser::class);
    }
}
