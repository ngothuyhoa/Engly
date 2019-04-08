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

Route::get('/', 'User\HomeController@index')->name('home');
Route::get('/post', 'User\PostController@index')->name('post');
Route::get('/post_featured', 'User\PostController@indexFeatured')->name('post_featured');
Route::get('user/{id}', 'User\UserController@show')->name('user_detail');

Route::get('/user', function () {
    return view('page_user.user.index');
})->name('user');

Auth::routes();
// Post
Route::get('/post', 'User\PostController@index')->name('post');
Route::get('/post/{slug}', 'User\PostController@show')->name('post_detail');
Route::get('/find_tag/{slug}', 'User\PostController@findByTag')->name('find_tag');

//User

