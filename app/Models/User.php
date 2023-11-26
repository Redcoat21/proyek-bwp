<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'username';
    public $keyType = 'string';
    public $incrementing = false;
    public $table = 'user';
    public $timestamps = false;
}
