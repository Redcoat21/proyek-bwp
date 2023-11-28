<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function addUser(string $username, string $password, string $email, string $name, string $role): void {
        User::create([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role
        ]);
    }

    public function authenticateUser(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'bail|required',
            'password' => 'bail|required'
        ], [
            'nama.required' => 'Username harus diisi.',
            'password.required' => 'Pasword harus diisi.'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('home');
        }

        return back()->withErrors([
            'username' => 'Invalid Username'
        ])->onlyInput('username');
    }
}
