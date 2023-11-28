<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'username';
    public $keyType = 'string';
    public $incrementing = false;
    public $table = 'user';
    public $timestamps = false;

    public $fillable = ['username', 'email', 'password', 'name', 'role'];
}
