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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('blog/{slug}', 'HomeController@showPost');
Route::get('tags/{tag?}', 'HomeController@tags');
Route::get('archives', 'HomeController@archives');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'PostController@index');
    Route::resource('posts', 'PostController');
    Route::resource('tags', 'TagController');
});