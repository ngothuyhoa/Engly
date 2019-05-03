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
Route::get('user/{username}', 'User\UserController@show')->name('user_detail');

Route::get('/user', function () {
    return view('page_user.user.index');
})->name('user');

Auth::routes();
// Post
Route::get('/post', 'User\PostController@index')->name('post');
Route::get('/post/{slug}', 'User\PostController@show')->name('post_detail');
Route::get('/find_tag/{slug}', 'User\PostController@findByTag')->name('find_tag');
Route::get('/create_post', 'User\PostController@create')->name('post_create');
Route::post('/store_post', 'User\PostController@store')->name('post_store');

//User

/*Route::get('admin', function(){
	return view('admin.dashboard.index');
});*/

//Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Post
    Route::get('post', 'PostController@index')->name('index_post');
    Route::get('post/create', 'PostController@create')->name('create_post');
    Route::post('post/store', 'PostController@store')->name('store_post');

    //User
    Route::get('user', 'UserController@index')->name('index_user');

    //Feedback
    Route::get('feedback', 'FeedbackController@index')->name('index_feedback');
    Route::get('feedback/destroy/{id}', 'FeedbackController@destroy')->name('destroy_feedback');

    //Comment
    Route::get('comment', 'CommentController@index')->name('index_comment');

    //Report
	Route::get('report', 'ReportController@index')->name('index_report');

    //following	
  	Route::get('following', 'FollowingController@index')->name('index_following');
});
