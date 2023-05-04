<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function principle()
    {
        return view('principles.home');
    }

    public function teacher()
    {
        return view('teachers.home');
    }

    public function student()
    {
        return view('students.home');
    }
}
