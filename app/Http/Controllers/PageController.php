<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Difficulty;
use App\Models\Category;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
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

    public function toEdit()
    {
        return redirect()->route('profile.editProfile.get');
    }

    public function showBack(): RedirectResponse
    {
        return back();
    }

    public function showHome(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('home', ['topLecturers' => $this->getTopLecturers(), 'topCourses' => $this->getTopCourses(), 'newCourses' => $this->getNewestCourses()]);
    }

    public function showCourse(Request $req): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        $id = $req->id;
        $course = Course::where('id', $id)->first();

        $username = auth()->user()->username;

        $trans = DB::select("
            SELECT t.id, t.course, t.student
            FROM transactions AS `t`
            LEFT JOIN users AS `u` ON u.username = t.student
            LEFT JOIN courses AS `c` ON c.id = t.course
            WHERE t.course = '$id' AND c.status = 1 AND t.student = '$username'
        ");

        // dd($trans);

        return view('courses.course', ['course' => $course, 'trans' => $trans]);
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

    public function showProfile(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('profile');
    }

    public function showEditProfile(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('student.editProfile');
    }

    public function showAddCourse(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('lecturer.addCourse');
    }

    public function showListLecturer(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('lecturerFS.listLecturer', ['lecturers' => User::where('role', 'LEC')->get()]);
    }

    public function showLecturerDetail(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('lecturerFS.lecturer');
    }

    public function showAddSubCourse(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('lecturer.addSubCourse');
    }

    // public function getTopThreeLecturer()
    public function getTopLecturers(): array
    {
        $res = DB::select("
            SELECT u.username, u.name, u.profile_picture, u.description
            FROM transactions AS `t`
            LEFT JOIN courses AS `c` ON c.id = t.course
            LEFT JOIN users AS `u` ON u.username = c.lecturer
            WHERE u.role = 'LEC'
            GROUP BY u.username, u.name, u.profile_picture, u.description LIMIT 3
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
        return DB::select("
            SELECT c.id, c.name, c.description, u.name as user_name, u.profile_picture, COUNT(*) AS `occurences`, c.cover
            FROM transactions AS `t`
            LEFT JOIN courses AS `c` ON c.id = t.course
            LEFT JOIN users AS `u` ON u.username = c.lecturer
            WHERE c.status = 1
            GROUP BY c.id, c.name, c.description, u.name, u.profile_picture, c.cover
            ORDER BY `occurences` DESC
            LIMIT 3;
        ");
    }

    public function showAdminProfile(){
        return view('admin.adminProfile');
    }

    public function getNewestCourses(): Collection
    {
        $newCourses = Course::orderBy('id', 'DESC')->take(3 * 3)->get();
        $myCourses = $newCourses->chunk(3);
        return $myCourses;
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

    function listAddCourse(){
        $difficultylist = Difficulty::all(['id', 'name']);
        $param["difficulty"] = $difficultylist;
        $categorylist = Category::all(['id', 'name']);
        $param["category"] = $categorylist;
        return view("lecturer.addCourse", $param);
    }

    public function updateUser(Request $req){
        $user = User::find($req->uname);
        $param["user"] = $user;
        return view('admin.updateUser', $param);
    }
}
