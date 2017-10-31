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

Route::get('/', 'SearchController@getIndex');
Route::get('search', 'SearchController@getSearch');
Route::get('threads/view/{id}', 'ThreadController@getView');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    
    // Settings
    Route::get('settings', 'SettingsController@getIndex');
    Route::post('settings', 'SettingsController@postIndex');
    
    // Threads
    Route::get('threads/create', 'ThreadController@getCreate');
    Route::post('threads/create', 'ThreadController@postCreate');
    Route::get('threads/edit/{id}', 'ThreadController@getEdit');
    Route::post('threads/edit', 'ThreadController@postEdit');
    Route::get('threads/delete/{id}', 'ThreadController@getDelete');
    Route::post('threads/delete', 'ThreadController@postDelete');
    
    // Posts
    Route::post('posts/create', 'PostController@postCreate');
    Route::get('posts/edit/{id}', 'PostController@getEdit');
    Route::post('posts/edit', 'PostController@postEdit');
    Route::get('posts/delete/{id}', 'PostController@getDelete');
    Route::post('posts/delete', 'PostController@postDelete');
});