<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $keyType = 'int';
    public $incrementing = true;
    public $table = 'course';
    public $timestamps = false;
}
