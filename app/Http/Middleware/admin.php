<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         if(auth::check() && Auth::user()->role =='admin'){
           return redirect()->intended('admin');
    }else{
        return redirect('login')->with("message", "Only admin can access admin dashboard");
    }
    return $next($request);
}
}
