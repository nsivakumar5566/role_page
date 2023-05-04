<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Principle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $auth = Auth::user();
        if (!$auth) {
            return redirect('/')->with('message', 'Unauthorized');
        } else if ($auth->role == 'Principle') {
            return $next($request);
        } else {
            switch ($auth->role) {
                case 'Teacher':
                    $route = 'teacher/home';
                    break;
                case 'Student':
                    $route = 'student/home';
                    break;
            }
            return redirect($route)->with('message', 'Illegal Enry');
        }
    }
}
