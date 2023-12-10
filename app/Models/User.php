<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\RedirectResponse;

class User extends Model
{
    use HasFactory;

    public $keyType = "string";
    public $timestamps = false;
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
                break;
            case 'ADM':
                $user = new Admin;
                $user->username = $username;
                break;
            case 'LEC':
                $user = new Lecturer;
                $user->username = $username;
                break;
        }

        $user->save();
    }
}
