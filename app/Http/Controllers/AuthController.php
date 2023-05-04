<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            switch ($role) {
                case 'Principle':
                    $route = 'principle/home';
                    break;
                case 'Teacher':
                    $route = 'teacher/home';
                    break;
                case 'Student':
                    $route = 'student/home';
                    break;
            }

            return redirect($route)->with('message', 'Login Success');
        }

        return redirect('/')->with('message', 'Invalid Credential');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('message', 'Logged out');
    }
}
