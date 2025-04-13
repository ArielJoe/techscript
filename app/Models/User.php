<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'user';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'email',
        'password',
        'role',
        'updated_at',
        'created_at',
        'Major_id',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'role' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
