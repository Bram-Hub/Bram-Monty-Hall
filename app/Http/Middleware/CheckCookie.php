<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCookie
{
    /**
     * Used as a test to check if the played cookie is set and set it if not.
     * Note: if not set, sends you to the cookie controller to get a cookie id...
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        // check to see if the user has played a game
        if ( !( $request->hasCookie('played') ) ) {
            return response()->view('no_cookie');
        }

        return $next($request);
    }
}
