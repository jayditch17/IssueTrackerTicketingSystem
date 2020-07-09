<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            # code...
            return redirect()->route('login');
        }
        //admin
        if (Auth::user()->role == 1) {
            # code...
            return $next($request)->Route('admin');
        }
        //moderator
        if (Auth::user()->role == 2) {
            # code...
            return $next($request)->Route('moderator');
        }
        //user
        if (Auth::user()->role == 3) {
            # code...
            return $next($request);
        }
    }
}
