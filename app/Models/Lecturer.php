<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'description'];
    public $keyType = "string";
    public $timestamps = false;
    public $primaryKey = 'username';
    public $incrementing = false;

    public function course(): HasMany
    {
        return $this->hasMany(Course::class, 'lecturer');
    }
}
