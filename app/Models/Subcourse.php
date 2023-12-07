<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subcourse extends Model
{
    use HasFactory;

    protected $keyType = "string";
    public $primaryKey = 'id';
    public $timestamps = false;

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subcourses_completion', 'subcourse', 'student', 'id', 'username');
    }
}
