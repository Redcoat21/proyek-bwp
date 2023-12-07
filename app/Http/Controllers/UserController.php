<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function create(string $username, string $password, string $email, string $name, string $role): void {
        User::create([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role
        ]);
    }
}
