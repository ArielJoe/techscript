<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $table = 'student';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function letters(): HasMany
    {
        return $this->hasMany(Letter::class, 'Student_id');
    }

    public function enrollments(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class, 'Student_id');
    }
}
