<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kaprodi extends Model
{
    protected $table = 'kaprodi';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'full_name',
        'User_id'
    ];

    public function letters(): HasMany
    {
        return $this->hasMany(Letter::class, 'Kaprodi_id');
    }
}
