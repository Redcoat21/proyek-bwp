<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subcourse;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DataController extends Controller
{
    //
    public function search(Request $request)
    {
        try {
            $query = $request->get('query');
            $results = Course::where('name', 'like', '%' . $query . '%')->where('status', 1)->with('lecturers')->get();
            return response()->json($results);
        } catch (Exception $e) {
            // Log the exception for debugging
            dump($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function searchLecturer(Request $request)
    {
        try {
            $query = $request->get('query');

            $results = User::where('name', 'like', '%' . $query . '%')
                        ->where('role', 'LEC')
                        ->get();

            return response()->json($results);
        } catch (Exception $e) {
            // Log the exception for debugging
            dump($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    function addUser(Request $req){
        $req->validate([
            'username' => 'required|max:100',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:150',
            'email' => 'required|email|max:150',
            'password' => 'required|min:6|max:72',
            'role' => ['required', Rule::in(['ADM', 'LEC', 'STU'])],
        ], [
            'username.required' => 'Username is required.',
            'name.required' => 'Full name is required.',
            'name.regex' => 'Name must not contain symbols or numbers.',
            'email.required' => 'Email is required.',
            'email.email' => 'It must be a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'The password must contain at least 6 characters.',
            'role.required' => 'Role is required.',
            'role.in' => 'Invalid role selected.',
            'password.max' => 'The password must not have over 72 characters.',
            'username.max' => 'The username must not have over 100 characters.',
            'name.max' => 'The name must not have over 150 characters.',
            'email.max' => 'The email must not have over 150 characters.',
        ]);

        $pass = Hash::make($req->password);

        $newUser = new User();
        $newUser->username = $req->username;
        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->password = $pass;
        $newUser->role = $req->role;

        $res = $newUser->save();

        if ($res) {
            return redirect('/listUser')->with("msg", "Berhasil add user");
        } else {
            return redirect('/addUser')->with("msg", "Gagal add user");
        }
    }

    function addAdmin(Request $req){
        $req->validate([
            'username' => 'required|max:100',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:150',
            'email' => 'required|email|max:150',
            'password' => 'required|min:6|max:72'
        ], [
            'username.required' => 'Username is required.',
            'name.required' => 'Full name is required.',
            'name.regex' => 'Name must not contain symbols or numbers.',
            'email.required' => 'Email is required.',
            'email.email' => 'It must be a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'The password must contain at least 6 characters.',
            'password.max' => 'The password must not have over 72 characters.',
            'username.max' => 'The username must not have over 100 characters.',
            'name.max' => 'The name must not have over 150 characters.',
            'email.max' => 'The email must not have over 150 characters.',
        ]);

        $pass = Hash::make($req->password);

        $newUser = new User();
        $newUser->username = $req->username;
        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->password = $pass;
        $newUser->role = 'ADM';

        $res = $newUser->save();

        if ($res) {
            return redirect('/master')->with("msg", "Berhasil add user");
        } else {
            return redirect('/addAdmin')->with("msg", "Gagal add user");
        }
    }

    function deleteUser(Request $req){
        $user = User::withTrashed()->find($req->uname);

        if($user->trashed()){
            $res = $user -> restore();
        }else{
            $res = $user -> delete();
        }

        if($res){
            return redirect('/listUser')->with("msg", "Action Berhasil");
        }
        else{
            return redirect('/listUser')->with("msg", "Action Gagal");
        }
    }

    function deleteAdmin(Request $req){
        $user = User::withTrashed()->find($req->uname);

        if($user->trashed()){
            $res = $user -> restore();
        }else{
            $res = $user -> delete();
        }

        if($res){
            return redirect('/master')->with("msg", "Action Berhasil");
        }
        else{
            return redirect('/master')->with("msg", "Action Gagal");
        }
    }

    function buyCourse(Request $req){
        $id = $req->id;
        $course = Course::where('id', $id)->first();
        $user = auth()->user();

        DB::table('transactions')->insert([
            'course' => $course->id,
            'student' => $user->username,
            'time' => now()
        ]);

        return redirect('/course/' . $id)->with("msg", "Pembelian Berhasil!");
    }

    function addCourse(Request $req){
        $req->validate([
            'title' => 'required|max:200',
            'price' => 'required|numeric',
            'desc' => 'required',
            'image' =>'required|max:500'
        ], [
            'title.required' => 'Title is required.',
            'title.max' => 'Title must not have over 200 characters',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be number.',
            'desc.required' => 'Description is required.',
            'image.required' => 'Cover image is required.'
        ]);

        $image = $req->file('image');

        $imageName = time() . "_" . $req->title . "." . $image->extension();
        Storage::disk('public')->putFileAs('course', $image, $imageName);

        $newCourse = new Course();
        $newCourse->name = $req->title;
        $newCourse->status = 0;
        $newCourse->description = $req->desc;
        $newCourse->price = (int) $req->price;
        $newCourse->cover = "storage/" . $req->imageName;
        $newCourse->difficulty = $req->difficulty;
        $newCourse->lecturer = auth()->user()->username;
        $newCourse->category = $req->category;
        $res = $newCourse->save();

        if($res){
            return redirect('/profile')->with("msg", "Berhasil Add Course!");
        }
        else{
            return redirect('/addCourse')->with("msg", "Gagal Add Course!");
        }
    }

    public function addSubCourse(Request $req){
        $req->validate([
            'title' => 'required|max:200',
            'desc' => 'required|max:1000'
        ], [
            'title.required' => 'Title is required.',
            'title.max' => 'Title length must not be over 200 letters.',
            'desc.required' => 'Description is required.',
            'desc.max' => 'Description length must not be over 1000 letters.'
        ]);
        $newSubCourse = new Subcourse();
        $newSubCourse->name = $req->title;
        $newSubCourse->description = $req->desc;
        $newSubCourse->course = $req->id;
        $res = $newSubCourse->save();
        if($res){
            return redirect('/lecturer/course/'.$req->id)->with("msg", "Berhasil Add Sub Course");
        }
        else{
            return redirect('/addSubCourse/'.$req->id)->with("msg", "Gagal Add Sub Course");
        }
    }

    public function updateSubCourse(Request $req){
        $req->validate([
            'title' => 'required|max:200',
            'desc' => 'required|max:1000'
        ], [
            'title.required' => 'Title is required.',
            'title.max' => 'Title length must not be over 200 letters.',
            'desc.required' => 'Description is required.',
            'desc.max' => 'Description length must not be over 1000 letters.'
        ]);
        $newSubCourse = Subcourse::find($req->id);
        $newSubCourse->name = $req->title;
        $newSubCourse->description = $req->desc;
        $res = $newSubCourse->save();
        if($res){
            return redirect('/lecturer/course/'.$newSubCourse->course)->with("msg", "Berhasil Update Sub Course");
        }
        else{
            return redirect('/editSubCourse/'.$req->id)->with("msg", "Gagal Update Sub Course");
        }
    }

    public function deleteSubCourse(Request $req){
        $newSubCourse = Subcourse::find($req->id);
        $course = $newSubCourse->course;
        $res = $newSubCourse->delete();
        if($res){
            return redirect('/lecturer/course/'.$course)->with("msg", "Berhasil Delete Sub Course");
        }
        else{
            return redirect('/lecturer/course/'.$course)->with("msg", "Gagal delete Sub Course");
        }
    }

    public function publishCourse(Request $req){
        $course = Course::find($req->id);
        $course->status = 1;
        $res = $course->save();
        return redirect('/profile')->with('msg', 'Course published!');
    }

    public function disableCourse(Request $req){
        $course = Course::find($req->id);
        $course->status = 2;
        $res = $course->save();
        return redirect('/profile')->with('msg', 'Course disabled!');
    }
}
