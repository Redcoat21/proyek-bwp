<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{

    public function showAuthPage(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        if(!Session::has('login'))
        {
            Session::put('login', true);
        }

        return view('login');
    }

    public function showHome(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('home', ['topLecturers' => $this->getTopLecturers(), 'topCourses' => $this->getTopCourses()]);
    }

    public function getTopLecturers(): JsonResponse
    {
        $res = DB::select("
            SELECT u.username, u.name, u.profile_picture, l.description
            FROM transactions AS `t`
            LEFT JOIN courses AS `c` ON c.id = t.course
            LEFT JOIN lecturers AS `l` ON l.username = c.lecturer
            LEFT JOIN users AS `u` ON u.username = l.username
            GROUP BY u.username, u.name, u.profile_picture, l.description LIMIT 3
        ");
        return response()->json($res);
    }

    public function toggleLogin(): RedirectResponse
    {
        // Toggle kondisi loginnya.
        if(Session::has('login'))
        {
            Session::put('login', !Session::get('login'));
        }
        else
        {
            Session::put('login', false);
        }

        return back();
    }

    public function getTopCourses(): JsonResponse
    {
        $res = DB::select("
            SELECT c.id, c.name, c.description, u.username, u.profile_picture, COUNT(*) AS `occurences`
            FROM transactions AS `t`
            LEFT JOIN courses AS `c` ON c.id = t.course
            LEFT JOIN lecturers AS `l` ON l.username = c.lecturer
            LEFT JOIN users AS `u` ON u.username = l.username
            WHERE c.status = 1
            GROUP BY c.id, c.name, c.description, u.username, u.profile_picture
            ORDER BY `occurences` DESC
            LIMIT 3;
        ");

        return response()->json($res);
    }
}
