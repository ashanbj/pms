<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class company_check
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
        if($role=="company") {
            return $next($request);
        }
        else if($role=="admin") {
            return redirect('/admin/dashboard');
        }
        else if($role=="user") {
            return redirect('/chemist/dashboard');
        }
        else {
            return redirect('/')->with('nopmessage', 'you have no permission!');
        }
    }
}
