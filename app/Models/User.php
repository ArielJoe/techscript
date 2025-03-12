<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Specify the table name
    protected $table = 'user';

    // Define the primary key as 'id' (VARCHAR)
    protected $primaryKey = 'id';

    // Indicate that the primary key is not auto-incrementing
    public $incrementing = false;

    // Define fillable fields
    protected $fillable = [
        'id',
        'email',
        'password',
        'role',
    ];

    // Hide sensitive fields
    protected $hidden = [
        'password',
    ];

    // Cast the 'id' to string since it's VARCHAR
    protected $casts = [
        'id' => 'string',
    ];

    // Enable timestamps (already present in your table)
    public $timestamps = true;
}
