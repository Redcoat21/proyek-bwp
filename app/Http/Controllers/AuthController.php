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
            'username' => 'Invalid Username'
        ])->onlyInput('username');
    }

    public function register(Request $request): RedirectResponse
    {
        $credentials = $this->validateRegisterInput($request);

        $username = $credentials['username'];
        $user = User::find($username);

        if($user){
            // Apabila user kembar.
            return back()->withErrors('error', 'Username sudah ada!');
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
            'nama.required' => 'Nama lengkap harus diisi.',
            'name.regex' => 'Nama tidak boleh mengandung simbol atau angka.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Harus berupa email.',
            'username.required' => 'Username harus diisi.',
            'passwordConfirmation.required' => 'Confirm password harus diisi.',
            'confirm.same' => 'Confirm password tidak sama dengan password.',
            'password.required' => 'Pasword harus diisi.',
            'password.min' => 'Pasword minimal mengandung 6 karakter.'
        ]);
    }

    private function validateLoginInput(Request $request): array | null
    {
        return $request->validate([
            'username' => 'bail|required',
            'password' => 'bail|required'
        ], [
            'username.required' => 'Username harus diisi.',
            'password.required' => 'Pasword harus diisi.'
        ]);
    }
}
