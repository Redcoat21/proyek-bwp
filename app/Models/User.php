<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;
    use SoftDeletes;

    public $keyType = "string";
    public $timestamps = true;
    public $primaryKey = 'username';
    public $incrementing = false;
    public $guarded = [];

    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'role');
    }

    protected static function booted()
    {
        static::created(function (User $user) {
            User::createSpecifiedUser($user->username, $user->role);
        });
    }

    private static function createSpecifiedUser(string $username, string $role): void
    {
        $user = null;
        switch($role)
        {
            case 'STU':
                $user = new Student;
                $user->username = $username;
                $user->phone = fake()->phoneNumber();
                break;
            case 'ADM':
                $user = new Admin;
                $user->username = $username;
                break;
            case 'LEC':
                $user = new Lecturer;
                $user->username = $username;
                $user->description = fake()->text();
                break;
        }

        $user->save();
    }
}
