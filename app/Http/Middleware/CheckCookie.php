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
        /** 
         * checks to see if the user has played a game
         * if user has played, passes them to wherever they were going
         * otherwise creates a cookie for them and routes them to the play page
         * 
         * NOTE: as of now just routes to the default play page
         *       should update when a first time play page exists
         * 
         * NOTE: as of now cookies only live for 1 min for testing
         *       should update to longer time (or forever) when done testing
         */

        if ( $request->hasCookie('playID') ) {
            return $next($request);
        } else {
            // time for the cookie to live, 1 min for testing
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
