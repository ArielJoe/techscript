<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $table = 'letter';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'category',
        'purpose',
        'topic',
        'addressed_to',
        'list_description',
        'selected_course',
<<<<<<< HEAD
        'accepted_by',
=======
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
        'status',
        'file_path',
        'updated_at',
        'created_at',
        'Student_id',
        'Kaprodi_id',
        'MO_id',
        'Major_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
