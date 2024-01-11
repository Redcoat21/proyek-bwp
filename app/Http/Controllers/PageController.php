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
use Illuminate\Support\Facades\Auth;
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
            WHERE t.course = '$id' AND t.student = '$username'
        ");

        // dd($id, $username, $trans);

        return view('courses.course', ['course' => $course, 'trans' => $trans]);
    }

    public function showListCourse(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        return view('courses.listCourse', ['courses' => Course::all()]);
    }

    public function showCourseDetail(Request $req)
    {
        $id = $req->id;
        $course = Course::where('id', $req->id)->first();

        $haveCourse =
            Auth::user()->buyedCourses()
            ->where('course', '=', $course->id)
            ->where('student', '=', Auth::user()->username)
            ->get()
            ->first();

        if($haveCourse) {
            $username = auth()->user()->username;
            $subCourse = Subcourse::where('course', $id)->get();

            $comp = [];

            foreach ($subCourse as $sub) {
                $comp[$sub->id] = DB::select("
                SELECT s.id, s.subcourse, s.student
                FROM subcourses_completion AS `s`
                WHERE s.subcourse = '$sub->id' AND s.student = '$username'");
            }

            return view('courses.courseDetail', ['course' => $course, 'subCourse' => $subCourse, 'comp' => $comp]);
        } else {
            return redirect()->route('course.get', ['id' => $id, 'trans' => null]);
        }
    }

    public function showSubCourse(Request $req)
    {
        $id = $req->id;
        $subCourse = Subcourse::where('id', $id)->first();

        $course = Course::where('id', $subCourse->course)->first();

        $listSubCourse = Subcourse::where('course', $course->id)->get();

        $username = auth()->user()->username;

        $index = -1;

        for ($i=0; $i < $listSubCourse->count(); $i++) {
            if($listSubCourse[$i]->id == $id){
                $index = $i;
                break;
            }
        }

        $prev = $listSubCourse[$index - 1] ?? null;
        $next = $listSubCourse[$index + 1] ?? null;

        $comp = DB::select("
            SELECT s.id, s.subcourse, s.student
            FROM subcourses_completion AS `s`
            WHERE s.subcourse = '$id' AND s.student = '$username'");

        if($comp == null){
            DB::table('subcourses_completion')->insert([
                'subcourse' => $id,
                'student' => $username,
                'completed_at' => now()
            ]);
        }

        $ctr_comp = 0;

        for ($i=0; $i < $listSubCourse->count(); $i++) {
            $id_temp = $listSubCourse[$i]->id;

            $temp = DB::select("
                SELECT s.id, s.subcourse, s.student
                FROM subcourses_completion AS `s`
                WHERE s.subcourse = '$id_temp' AND s.student = '$username'");

            if($temp != null){
                $ctr_comp++;
            }
        }

        if($ctr_comp == $listSubCourse->count()){
            DB::table('certificates')->insert([
                'course' => $course->id,
                'student' => $username
            ]);
        }

        $haveCourse =
            Auth::user()->buyedCourses()
            ->where('course', '=', $course->id)
            ->where('student', '=', Auth::user()->username)
            ->get()
            ->first();

        if($haveCourse) {
            return view('courses.subCourse', ['subCourse' => $subCourse, 'prev' => $prev, 'next' => $next]);
        }
        else{
            return redirect()->route('course.get', ['id' => $course->id, 'trans' => null]);
        }
    }

    public function showProfile(): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        $username = auth()->user()->username;

        if(auth()->user()->role=="LEC"){
            //data untuk Lecturer di profile
            $hiddenCourse = Course::where('lecturer', $username)->where('status',0)->get();
            $publishedCourse = Course::where('lecturer', $username)->where('status',1)->get();
            $disabledCourse = Course::where('lecturer', $username)->where('status',2)->get();
            $param["hiddenCourses"] = $hiddenCourse;
            $param["publishedCourses"] = $publishedCourse;
            $param["disabledCourses"] = $disabledCourse;
        }
        else{
            // ini masih asal
            $course = DB::select("
                SELECT t.id, t.course, t.student
                FROM transactions AS `t`
                WHERE t.student = '$username'
            ");

            $course_w_lec = DB::select("
                SELECT c.id, c.name, c.description, u.name as user_name, u.profile_picture, COUNT(*) AS `occurences`, c.cover
                FROM transactions AS `t`
                LEFT JOIN courses AS `c` ON c.id = t.course
                LEFT JOIN users AS `u` ON u.username = c.lecturer
                where t.student = '$username'
                GROUP BY c.id, c.name, c.description, u.name, u.profile_picture, c.cover
                LIMIT 3;
            ");

            $completed = [];
            $progress = [];

            foreach ($course as $c) {
                $temp = DB::select("
                    SELECT c.id, c.course, c.student
                    FROM certificates AS `c`
                    WHERE c.course = '$c->course' AND c.student = '$username'
                ");

                foreach ($course_w_lec as $lec) {
                    if($temp != null && $lec->id == $c->course){
                        $completed[] = $lec;
                        break;
                    }
                    else if($lec->id == $c->course){
                        $progress[] = $lec;
                        break;
                    }
                }

            }

            // dd($course, $completed, $progress);

            $param["completedCourses"] = $completed;
            $param["progressCourses"] = $progress;
            $param["ctrCompleted"] = count($completed);
            $param["ctrProgress"] = count($progress);
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
        $listcoursePublish = Course::where('lecturer', $req->username)->where('status', 1)->get();
        $countPublish = $listcoursePublish->count();
        $listcourse = Course::where('lecturer', $req->username)->get();
        $lecturer = User::Find($req->username);
        $follow = 0;

        foreach ($listcourse as $course) {
            $temp = DB::select("
                SELECT t.id, t.course, t.student
                FROM transactions AS `t`
                LEFT JOIN courses AS `c` ON c.id = t.course
                WHERE t.course = '$course->id'
                ");

            $temp2 = 0;
            $temp2 = count($temp);
            $follow += $temp2;
        }

        $param["Course"]=$listcoursePublish;
        $param["lecturer"]=$lecturer;
        $param["jumlah"]=$countPublish;
        $param["follow"]=$follow;
        return view('lecturerFS.lecturer',$param);
    }

    public function showAddSubCourse(Request $req): Application | Factory| \Illuminate\Contracts\View\View| \Illuminate\Foundation\Application
    {
        $course = Course::find($req->id);
        $param['course'] = $course;
        return view('lecturer.addSubCourse', $param);
    }

    // public function getTopThreeLecturer()
    public function getTopLecturers(): array
    {
        $res = DB::select("
            SELECT u.username, u.name, u.profile_picture, u.description
            FROM transactions AS `t`
            LEFT JOIN courses AS `c` ON c.id = t.course
            LEFT JOIN users AS `u` ON u.username = c.lecturer
            WHERE u.role = 'LEC' AND deleted_at IS NULL
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
        $newCourses = Course::orderBy('id', 'DESC')->where('status', 1)->take(3 * 3)->get();
        $myCourses = $newCourses->chunk(3);
        return $myCourses;
    }

    public function showAdminPage(){
        $listLecturer = User::withTrashed()->where('role', 'LEC')->get();
        $listStudent = User::withTrashed()->where('role', 'STU')->get();
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

    public function showDetailCourse(Request $req){
        $course = Course::find($req->id);
        $param['course'] = $course;
        $subcourse = Subcourse::where('course',$req->id)->get();
        $param['subcourses'] = $subcourse;
        return view('lecturer.updateCourse', $param);
    }

    public function updateSubCourse(Request $req){
        $sub = Subcourse::find($req->id);
        $param['subcourse'] = $sub;
        $course = Course::find($sub->course);
        $param['course'] = $course;
        return view('lecturer.updateSubCourse', $param);
    }

    public function detailSubCourseLecturer(Request $req){
        $sub = Subcourse::find($req->id);
        $param['subcourse'] = $sub;
        $course = Course::find($sub->course);
        $param['course'] = $course;
        return view('lecturer.detailSubCourse', $param);
    }
    ///Master Controller
    public function masterAccount(){
        $listAdmin = User::withTrashed()->where('role', 'ADM')->get();
        $param["listAdmins"] = $listAdmin;
        return view('master.master',$param);
    }

    public function MasterAddAdmin(){
        return view('master.addAdmin');
    }
}
