<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserSession;
use Auth;   
use Request;   

class AuthApi
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

        if(Auth::check()){
            if(Request::is('admin/dashboard') && !Auth::user()->hasRole('admin')){
                return redirect('/login');
            }
            return $next($request);
        }
        return redirect('/login');
    }
}
