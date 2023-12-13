<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;

class PageController extends Controller
{
    public function showAuthPage(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('login');
    }

    public function showHome(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('home');
    }

    public function getTopThreeLecturer()
    {
        $res = DB::select("SELECT course, COUNT(*) AS `occurences` FROM transactions GROUP BY course LIMIT 3");
        return $res;
//        dd($res);
    }
}
