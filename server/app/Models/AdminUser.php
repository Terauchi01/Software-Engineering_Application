<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class AdminUser extends Model implements Authenticatable
{
    use HasFactory,AuthenticableTrait;

    protected $table = 'admin_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_name',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
        'deletion_date' => 'datetime',
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }
}
