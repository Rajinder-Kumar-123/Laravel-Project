<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class student
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
         if(auth::check() && Auth::user()->role =='student'){
            return $next($request);
    }else{
        return redirect('login')->with("message", "Only student can access student dashboard");
    }
   
}
}
