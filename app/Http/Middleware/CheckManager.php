<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckManager
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
        if (!Auth::guard('manager')->check()) {
            return redirect()->route('manager.loginpage');
        }else if(Auth::guard('manager')->user()->login_status == 0){
            Auth::guard('manager')->logout();
            return redirect()->route('manager.loginpage');
        }
        return $next($request);
    }
}
