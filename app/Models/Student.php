<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    public $keyType = "string";
    public $timestamps = false;
    public $primaryKey = 'username';
    public $incrementing = false;

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
