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
    return view('page_user.home.index');
})->name('homes');
Route::get('/post', function () {
    return view('page_user.post.index');
})->name('post');

Route::get('/user', function () {
    return view('page_user.user.index');
})->name('user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'User\PostController@index')->name('post');
