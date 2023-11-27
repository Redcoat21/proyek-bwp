<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function validateLoginInput(Request $request)
    {
        return Inertia::render('Welcome');
    }
}
