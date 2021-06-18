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
         * NOTE: cookies live forever as of (now on the user end)
         * 
         * NOTE: does not check if cookie exists in the database!
         *       thus a user could assign any value and this would think they have played
         *       not a big deal for now but could add in the future
         *       only problem is that it would be a lot of queries to the database
         *       since this is called on every major page request
         */

        if ( $request->hasCookie('playID') ) {
            return $next($request);
        } else {
            // generate a cookie using database
            $cookie = new Cookie();
            $cookie->played = False;

            // add cookie to user
            $user_cookie = cookie()->forever('playID', $cookie->id);
            $response = response()->view('cookies');
            $response->withCookie($user_cookie);
            
            // push to database
            $cookie->save();

            // return user to cookie page
            return $response;
        }
  
    }
}
