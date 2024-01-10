<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Difficulty;
use App\Models\Category;
use App\Models\Subcourse;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;


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

    public function showCourseDetail(Request $req): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        $id = $req->id;
        $course = Course::where('id', $id)->first();

        $subCourse = Subcourse::where('course', $id)->get();

        return view('courses.courseDetail', ['course' => $course, 'subCourse' => $subCourse]);
    }

    public function showSubCourse(Request $req): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        $id = $req->id;
        $subCourse = Subcourse::where('id', $id)->first();

        $course = Course::where('id', $subCourse->course)->first();

        $listSubCourse = Subcourse::where('course', $course->id)->get();

        $index = -1;

        for ($i=0; $i < $listSubCourse->count(); $i++) {
            if($listSubCourse[$i]->id == $id){
                $index = $i;
                break;
            }
        }

        $prev = $listSubCourse[$index - 1] ?? null;
        $next = $listSubCourse[$index + 1] ?? null;

        return view('courses.subCourse', ['subCourse' => $subCourse, 'prev' => $prev, 'next' => $next]);
    }

    public function showProfile(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        if(auth()->user()->role=="LEC"){
            //data untuk Lecturer di profile
            $hiddenCourse = Course::where('lecturer',auth()->user()->username)->where('status',0)->get();
            $publishedCourse = Course::where('lecturer',auth()->user()->username)->where('status',1)->get();
            $disabledCourse = Course::where('lecturer',auth()->user()->username)->where('status',2)->get();
            $param["hiddenCourses"] = $hiddenCourse;
            $param["publishedCourses"] = $publishedCourse;
            $param["disabledCourses"] = $disabledCourse;
        }
        else{
            // ini masih asal
            $course = Course::all();
            $param["courses"] = $course;
        }
        return view('profile', $param);
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

    public function showLecturerDetail(Request $req): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        $listcourse = Course::where('lecturer', $req->username)->get();
        $count = Course::where('lecturer', $req->username)->count();
        $lecturer = User::Find($req->username);
        $follow = 0;

        foreach ($listcourse as $course) {
            $temp = DB::select("
                SELECT t.id, t.course, t.student
                FROM transactions AS `t`
                WHERE t.course = '$course->id'
                ");

            $temp2 = 0;
            $temp2 = count($temp);
            $follow += $temp2;
        }

        $param["Course"]=$listcourse;
        $param["lecturer"]=$lecturer;
        $param["jumlah"]=$count;
        $param["follow"]=$follow;
        return view('lecturerFS.lecturer',$param);
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

    function testAjax(){
        return view("lecturerFS.listLecturer");
    }

    public function updateUser(Request $req){
        $user = User::find($req->uname);
        $param["user"] = $user;
        return view('admin.updateUser', $param);
    }
}
