<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table = 'favorite';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sender_id',
        'destination_user_id',
    ];

    protected $casts = [
        'deletion_date' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
