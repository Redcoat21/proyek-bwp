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

        if(Auth::attempt([
            'username' => $credentials['username_login'],
            'password' => $credentials['password_login']
        ])) {
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role === 'STU') {
                return redirect(route('home.get'));
            }
            else if($user->role === 'LEC') {
                return redirect(route('profile.get'));
            }
            else if($user->role === "ADM"){
                return redirect(route('adminProfile.get'));
            }

            return redirect('/');
        }

        return back()->withErrors([
            'username' => 'Invalid Username or Wrong Password!'
        ])->onlyInput('username');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect(route('home.get'));
    }

    public function register(Request $request): RedirectResponse
    {
        $credentials = $this->validateRegisterInput($request);

        $username = $credentials['username_register'];
        $user = User::find($username);

        if($user){
            // Apabila user kembar.
            return back()->withErrors(['kembar' => 'Username already exists!']);
        }
        else{
            $role = $credentials['inline-radio-group'] === 'student' ? 'STU' : 'LEC';
           User::create([
                'username' => $username,
                'password' => Hash::make($credentials['password_register']),
                'name' => $credentials['nama_register'],
                'email' => $credentials['email_register'],
                'role' => $role
            ]);

            return back()->with('success', 'User Registered succesfully!');
        }
    }

    private function validateRegisterInput(Request $request): array | null
    {
        return $request->validate([
            'nama_register' => 'required|regex:/^[a-zA-Z\s]+$/',
            'username_register' => 'required',
            'email_register' => 'required|email',
            'password_register' => 'required|min:6',
            'confirm_register' => 'required|same:password_register',
            'inline-radio-group' => 'required'
        ], [
            'nama_register.required' => 'Full name is required.',
            'nama_register.regex' => 'Name must not contain symbols or numbers.',
            'email_register.required' => 'Email is required.',
            'email_register.email' => 'It must be an email.',
            'username_register.required' => 'Username is required.',
            'confirm_register.required' => 'Confirm password is required.',
            'confirm_register.same' => 'Confirm password does not match the password.',
            'password_register.required' => 'Pasword must be filled.',
            'password_register.min' => 'The password must contain at least 6 characters.'
        ]);
    }

    private function validateLoginInput(Request $request): array | null
    {
        return $request->validate([
            'username_login' => 'bail|required',
            'password_login' => 'bail|required'
        ], [
            'username_login.required' => 'Username is required.',
            'password_login.required' => 'Password is required.'
        ]);
    }
}
