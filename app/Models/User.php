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

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'role');
    }
    public function teachedCourses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'lecturer');
    }

    public function buyedCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'transactions', 'student', 'course', 'username', 'id');
    }

    public function completedSubcourses(): BelongsToMany
    {
        return $this->belongsToMany(Subcourse::class, 'subcourses_completion', 'student', 'subcourse', 'username', 'id');
    }

    public function completedCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'certificates', 'student', 'course', 'username', 'id');
    }
}
