<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
	return view('education'); //changed to education for easy testing, change this back to play
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
