<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function getHomeGuest()
    {
        return view('home');
    }
    public function getlistcourse()
    {
        return view('listcourse');
    }
    public function getlecturer()
    {
        return view('lecturer');
    }
    public function getlecturerdetail()
    {
        return view('lecturer_detail');
    }
}
