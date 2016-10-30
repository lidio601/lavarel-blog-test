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

Route::get('/', 'HomeController@index')->name('home');

Route::get('login', function () {
	Log::debug("Route called: login form");
	return view('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	Route::any('/editor', 'EditorController@index');

	Route::get('/post/delete/{post_id}', 'EditorController@delete');

	Route::get('/post/edit/{post_id}', 'EditorController@edit');

	Route::get('/post/new', 'EditorController@index');

	Route::get('/post/save', 'EditorController@upsert');

});