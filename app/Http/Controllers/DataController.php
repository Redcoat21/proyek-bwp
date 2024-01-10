<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'username' => 'required',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email',
            'password' => 'required|min:6',
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

    function updateUser(Request $req){
        $req->validate([
            'username' => 'required',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email',
            'password' => 'required|min:6',
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
        ]);

        $pass = Hash::make($req->password);
        $newUser = User::find($req->uname);
        $newUser->username = $req->username;
        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->password = $pass;
        $newUser->role = $req->role;
        $res = $newUser->save();
        if($res){
            return redirect('/listUser')->with("msg", "Berhasil update user");
        }
        else{
            return redirect('/listUser')->with("msg", "Gagal update user");
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
            'title' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required',
            'image' =>'required'
        ], [
            'title.required' => 'Title is required.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be number.',
            'desc.required' => 'Description is required.',
            'image.required' => 'Cover image is required.'
        ]);
        $newCourse = new Course();
        $newCourse->name = $req->title;
        $newCourse->status = 0;
        $newCourse->description = $req->desc;
        $newCourse->price = (int) $req->price;
        $newCourse->cover = $req->image;
        $newCourse->difficulty = $req->difficulty;
        $newCourse->lecturer = auth()->user()->username;
        $newCourse->category = $req->category;
        $res = $newCourse->save();
        if($res){
            return redirect('/profile')->with("msg", "Action Berhasil");
        }
        else{
            return redirect('/addCourse')->with("msg", "Action Gagal");
        }
    }
}
