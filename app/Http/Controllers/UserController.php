<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function addCus($username, $password, $email, $name){
        $pass = Hash::make($password);
        $newUser = new User();
        $newUser->username = $username;
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $pass;
        $newUser->role = 'CUS';
        $res = $newUser->save();
    }

    function addAdm($username, $password, $email, $name){
        $pass = Hash::make($password);
        $newUser = new User();
        $newUser->username = $username;
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $pass;
        $newUser->role = 'ADM';
        $res = $newUser->save();
    }

    function addTea($username, $password, $email, $name){
        $pass = Hash::make($password);
        $newUser = new User();
        $newUser->username = $username;
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $pass;
        $newUser->role = 'TEA';
        $res = $newUser->save();
    }
}
