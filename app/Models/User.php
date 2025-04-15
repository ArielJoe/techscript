<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
=======

class User extends Authenticatable
{
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
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
