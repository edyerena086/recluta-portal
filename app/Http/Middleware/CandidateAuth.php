<?php

namespace ReclutaTI\Http\Middleware;

use Auth;
use Closure;

class CandidateAuth
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
        if (!Auth::check() || Auth::user()->role_id != 1) {
            return redirect('candidate');
        }

        return $next($request);
    }
}
