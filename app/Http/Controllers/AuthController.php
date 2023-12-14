<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function process(Request $request): RedirectResponse
    {
        // Request typenya login.
        if($request->type === 'login') {
            return $this->login($request);
        } else {
            return $this->register($request);
        }
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $this->validateLoginInput($request);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'username' => 'Invalid Username or Wrong Password!'
        ])->onlyInput('username');
    }

    public function register(Request $request): RedirectResponse
    {
        $credentials = $this->validateRegisterInput($request);

        $username = $credentials['username'];
        $user = User::find($username);

        if($user){
            // Apabila user kembar.
            return back()->withErrors('error', 'Username already exists!');
        }
        else{
            $role = $credentials['inline-radio-group'] === 'student' ? 'STU' : 'LEC';
            $user = User::create([
                'username' => $credentials['username'],
                'password' => Hash::make($credentials['password']),
                'name' => $credentials['nama'],
                'email' => $credentials['email'],
                'role' => $role
            ]);

            return back()->with('success', 'User Registered succesfully!');
        }
    }

    private function validateRegisterInput(Request $request): array | null
    {
        return $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm' => 'required|same:password',
            'inline-radio-group' => 'required'
        ], [
            'nama.required' => 'Full name is required.',
            'name.regex' => 'Name must not contain symbols or numbers.',
            'email.required' => 'Email is required.',
            'email.email' => 'It must be an email.',
            'username.required' => 'Username is required.',
            'confirm.required' => 'Confirm password is required.',
            'confirm.same' => 'Confirm password does not match the password.',
            'password.required' => 'Pasword must be filled.',
            'password.min' => 'The password must contain at least 6 characters.'
        ]);
    }

    private function validateLoginInput(Request $request): array | null
    {
        return $request->validate([
            'username' => 'bail|required',
            'password' => 'bail|required'
        ], [
            'username.required' => 'Username is required.',
            'password.required' => 'Password is required.'
        ]);
    }
}
