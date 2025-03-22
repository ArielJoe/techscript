<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MO extends Model
{
    protected $table = 'mo';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'full_name'
    ];

    public function letters(): HasMany
    {
        return $this->hasMany(Letter::class, 'MO_id');
    }
}
