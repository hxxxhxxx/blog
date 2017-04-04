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
////Route::get('post', 'PostController@index');
//Route::get('post', function () {
//    echo 'sss';
//});
////Route::get('/{slug}', 'HomeController@showPost');
//Route::get('/post/{slug}', function ($slug) {
//    echo $slug;
//});

Route::get('/{slug}', 'HomeController@showPost');