<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class User extends Model
{
    use HasFactory;

    public $keyType = "string";
    public $timestamps = false;
    public $primaryKey = 'username';
    public $incrementing = false;

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'role');
    }
}
