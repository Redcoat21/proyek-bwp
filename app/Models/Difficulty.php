<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Difficulty extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'difficulty', 'id');
    }
}
