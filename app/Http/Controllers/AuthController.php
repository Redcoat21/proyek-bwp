<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function validateLoginInput(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'nama.required' => 'Username harus diisi.',
            'password.required' => 'Pasword harus diisi.'
        ]);

        $username = $request -> username;
        $password = $request -> password;
        $user = User::find($username);

        if($user){
            if(Hash::check($password, $user->password)){
                return Inertia::render('Welcome');
            }
            return to_route('welcome')->with('msg', 'wrong');
        }
        else{
            return Inertia::render('Home');
        }
    }

    public function validateRegisterInput(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'passwordConfirmation' => 'required|same:password'
        ], [
            'name.required' => 'Nama lengkap harus diisi.',
            'name.regex' => 'Nama tidak boleh mengandung simbol atau angka.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Harus berupa email.',
            'username.required' => 'Username harus diisi.',
            'passwordConfirmation.required' => 'Confirm password harus diisi.',
            'passwordConfirmation.same' => 'Confirm password tidak sama dengan password.',
            'password.required' => 'Pasword harus diisi.',
            'password.min' => 'Pasword minimal mengandung 6 karakter.'
        ]);
        $username = $request -> username;
        $user = User::find($username);

        if($user){
            return Inertia::render('Home'); //kembar
        }
        else{
            $user = new UserController();
            $user->addUser($request->username, $request->password, $request->email, $request->name, 'CUS');
            return Inertia::render('Home');
        }
    }
}
