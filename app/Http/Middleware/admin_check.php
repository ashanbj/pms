<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
class admin_check
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
        $role = Session::get('role');
        if($role=="admin") {
            return $next($request);
        }
        else if($role=="company") {
            return redirect('/company/dashboard');
        }
        else if($role=="chemist") {
            return redirect('/chemist/dashboard');
        }
        else {
            return redirect('/')->with('nopmessage', 'you have no permission!');
        }
    }
}
