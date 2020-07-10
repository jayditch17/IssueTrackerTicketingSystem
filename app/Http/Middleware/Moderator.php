<?php

namespace App\Http\Middleware;

use Closure;

class Moderator
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
        if ($request->user() && $request->user()->type != 'moderator')
        {
            return new Response(view('unauthorized')->with('role', 'MODERATOR'));
        }
        return $next($request);
    }
}
