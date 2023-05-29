<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreOriginSessionCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        # CHECK ROL AND OAUTH FRO IP REQUEST
        if (Auth::check() && Auth::user()->role_id === 1 && $request->ip() === '127.0.0.1') {
            #SAVE COOKIE FOR 30 MINUTS
            $cookie = cookie('origin_session', 'true', 30); 
            return $next($request)->withCookie($cookie);
        }

        return $next($request);
    }
}
