<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $table = 'course';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'category',
        'sks',
        'period',
        'Major_id',
    ];

    public function enrollments(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class, 'Course_id');
    }
}
