<?php

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

Route::get('/', function () {
	Log::debug("Route called: listing blog posts");
    return view('home');
});

Route::get('login', function () {
	Log::debug("Route called: login form");
	return view('login');
});

Auth::routes();

Route::any('/editor', 'EditorController@index')->middleware('auth');
