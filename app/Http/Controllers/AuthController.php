<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $this->validateLoginInput($request);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('home');
        }

        return back()->withErrors([
            'username' => 'Invalid Username'
        ])->onlyInput('username');
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
            $user = new UserController();
            $user->create($username, $credentials['password'], $credentials['email'], $request->name, 'CUS');
            return back()->with('success', 'User Registered succesfully!');
        }
    }

    public function validateRegisterInput(Request $request): array | null
    {
        return $request->validate([
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
    }
}
