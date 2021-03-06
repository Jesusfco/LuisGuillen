<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class HostMiddleware
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
        if (Auth::check()) {

            if(Auth::user()->user_type == 10 ||  Auth::user()->user_type == 3) {
                return $next($request);
            }

            else {
                return back();
            }
                
        } else { 
            return redirect('/login');
        }
    }
    
}
