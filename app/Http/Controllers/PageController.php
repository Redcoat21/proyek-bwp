<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function showCourse(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('courses.course');
    }

    public function showListCourse(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('courses.listCourse', ['courses' => Course::all()]);
    }

    public function showCourseDetail(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('courses.courseDetail');
    }

    public function showSubCourse(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('courses.subCourse');
    }

    public function showStudentProfile(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('student.studentProfile');
    }

    public function showLecturerProfile(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('lecturer.lecturerProfile');
    }

    public function showListLecturer(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('lecturerFS.listLecturer');
    }

    public function showLecturerDetail(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('lecturerFS.lecturer');
    }

    // public function getTopThreeLecturer()
    public function getTopLecturers(): array
    {
        $res = DB::select("
            SELECT u.username, u.name, u.profile_picture, l.description
            FROM transactions AS `t`
            LEFT JOIN courses AS `c` ON c.id = t.course
            LEFT JOIN lecturers AS `l` ON l.username = c.lecturer
            LEFT JOIN users AS `u` ON u.username = l.username
            GROUP BY u.username, u.name, u.profile_picture, l.description LIMIT 3
        ");
        return $res;
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

    public function getTopCourses(): array
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

        return $res;
    }

    public function showAdminProfile(){
        return view('admin.adminProfile');
    }

    public function showAdminPage(){
        $listAdmin = User::withTrashed()->where('role', 'ADM')->get();
        $listLecturer = User::withTrashed()->where('role', 'LEC')->get();
        $listStudent = User::withTrashed()->where('role', 'STU')->get();
        $param["listAdmins"] = $listAdmin;
        $param["listLecturers"] = $listLecturer;
        $param["listStudents"] = $listStudent;
        return view('admin.listUser', $param);
    }

    public function showAddUser(){
        return view('admin.addUser');
    }

    public function updateUser(Request $req){
        $user = User::find($req->uname);
        $param["user"] = $user;
        return view('admin.updateUser', $param);
    }
}
