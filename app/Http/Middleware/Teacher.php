<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Teacher
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
            return redirect('/')->with('message', 'Unuthorized');
        } else if ($auth->role == 'Teacher') {
            return $next($request);
        } else {
            return redirect('student/home')->with('message', 'Illegal Enry');
        }

    }
}
