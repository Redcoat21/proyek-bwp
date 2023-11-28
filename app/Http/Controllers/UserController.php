<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function addUser(string $username, string $password, string $email, string $name, string $role): void {
        $pass = Hash::make($password);
        $newUser = new User();
        $newUser->username = $username;
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $pass;
        $newUser->role = $role;
        $res = $newUser->save();
    }
}
