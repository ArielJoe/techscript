<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Major extends Model
{
    protected $table = 'major';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'Major_id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'Major_id');
    }
}
