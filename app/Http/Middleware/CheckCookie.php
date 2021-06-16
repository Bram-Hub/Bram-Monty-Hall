<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Cookie;


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
        if ( $request->hasCookie('playID') ) {
            return $next($request);
        } else {
            $min = 1;

            // generate a cookie using database
            $cookie = new Cookie();
            $cookie->played = False;

            // add cookie to user ( 1 min test for now )
            $user_cookie = cookie('playID', $cookie->id, $min);
            $response = response()->view('cookies');
            $response->withCookie($user_cookie);
            
            // push to database
            $cookie->save();

            // return user to cookie page
            return $response;
        }
  
    }
}
