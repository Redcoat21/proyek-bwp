<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function difficulty(): HasOne
    {
        return $this->hasOne(Difficulty::class, 'difficulty');
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'category');
    }

    public function subcourses(): HasMany
    {
        return $this->hasMany(Subcourse::class, 'course');
    }

    public function lecturers(): HasOne
    {
        return $this->hasOne(User::class, 'lecturer')->where('role', '=', 'LEC');
    }

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'transactions', 'course', 'student', 'id', 'username')->where('role', '=', 'STU');
    }

    public function graduates(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'certificates', 'course', 'student', 'id', 'username');
    }
}
