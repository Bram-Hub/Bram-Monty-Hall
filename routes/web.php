<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckCookie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* unused...
Route::get('/', function () {
    return view('welcome');
});
*/

/* Put anything that should be checked for cookies in here
 * this should be most pages that the user could go to
 * and if a page is not here, there should be a reason.
 */
Route::middleware('checkcookie')->group(function () {
	Route::get('/', function () {
		return view('play');
	});

	Route::get('/play', function () {
		return view('play');
	});

	Route::get('/research', function () {
		return view('research');
	});

	Route::get('/database', function () {
		return view('database');
	});

	Route::get('/education', function () {
		return view('education');
	});

	Route::get('/dev', function () {
		return view('dev');
	});
});
