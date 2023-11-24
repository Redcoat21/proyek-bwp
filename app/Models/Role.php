<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'id';
    public $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = ['name'];

    protected static function newFactory(): Factory
    {
        return RoleFactory::new();
    }
}
