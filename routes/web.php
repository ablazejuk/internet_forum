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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    
    // Threads
    Route::get('threads/create', 'ThreadController@getCreate')->name('threads');
    Route::post('threads/create', 'ThreadController@postCreate');
    Route::get('threads/view/{id}', 'ThreadController@getView')->name('threads');
    
    // Posts
    Route::post('posts/create', 'PostController@postCreate');
});