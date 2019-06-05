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
//Login
Route::get('/redirect/{social}', 'User\SocialAuthController@redirect');
Route::get('/callback/{social}', 'User\SocialAuthController@callback');

Route::get('/', 'User\HomeController@index')->name('home');

//User
Route::get('user', 'User\UserController@index')->name('user');
Route::get('user/{username}', 'User\UserController@show')->name('user_detail');
Route::get('profile/{username}', 'User\UserController@profile')->name('user_profile');
Route::post('update_profile/{username}', 'User\UserController@updateProfile')->name('update_profile');
Route::get('/change_password','User\UserController@showChangePasswordForm');
Route::post('/change_password','User\UserController@changePassword')->name('change_password');

/*Route::get('/pusher','User\UserController@getPusher');
Route::get('/fire-event', function(){
    event(new  App\Events\HelloPusherEvent("Hi, I'm Trung Quân. Thanks for reading my article!"));
     return "Message has been sent.";
});
*/

Route::group(['middleware' => ['auth']], function () {
    Route::post('users/{user}/follow', 'User\UserController@follow')->name('follow');
    Route::Post('users/{user}/unfollow', 'User\UserController@unfollow')->name('unfollow');
    Route::get('/notifications', 'User\UserController@notifications');

});

Auth::routes();
// Post
Route::get('/post_featured', 'User\PostController@indexFeatured')->name('post_featured');
Route::get('/post', 'User\PostController@index')->name('post');
Route::get('/post/{slug}', 'User\PostController@show')->name('post_detail');
Route::get('/find_tag/{slug}', 'User\PostController@findByTag')->name('find_tag');
Route::get('/create_post', 'User\PostController@create')->name('post_create');
Route::post('/store_post', 'User\PostController@store')->name('post_store');
Route::post('/draft_post/{id}', 'User\PostController@draft')->name('post_draft');
Route::post('/public_post/{id}', 'User\PostController@postPublic')->name('post_public');
Route::get('/post_follow', 'User\PostController@follow')->name('post_follow');
Route::post('/destroy_post/{id}', 'User\PostController@destroy')->name('post_destroy');
Route::get('/post_edit/{slug}', 'User\PostController@edit')->name('post_edit');
Route::post('/post_update/{slug}', 'User\PostController@update')->name('post_update');

Route::get('/view', 'User\PostController@view')->name('view')->middleware('filter');

//User

Route::get('test', function(){
	return view('test');
});

//Comment
Route::post('/comment/store', 'User\CommentController@store')->name('comment_store');
Route::post('/reply/store', 'User\CommentController@replyStore')->name('reply_store');

//Search
Route::get('search/query', 'User\SearchController@search')->name('search');

//Feedback
Route::get('feedback', 'User\FeedbackController@create')->name('feedback_create');
Route::post('feedback/{user_id}', 'User\FeedbackController@store')->name('feedback_store');


//Report
Route::get('report/{id}', 'User\ReportController@create')->name('report_create');
Route::post('report/{id}', 'User\ReportController@store')->name('report_store');

//Pusher

Route::get('/notification', function () {
    return view('showNotification');
});

Route::get('/send', 'SendMessageController@index')->name('send');
Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');

//Admin

Route::get('admin/login', 'Admin\AdminLoginController@getLogin')->name('get_login');
Route::post('admin/login', 'Admin\AdminLoginController@postLogin')->name('post_login');
Route::get('admin/logout', 'Admin\AdminLoginController@getLogout')->name('get_logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=> 'admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Post
    Route::get('post', 'PostController@index')->name('index_post');
    Route::get('post/create', 'PostController@create')->name('create_post');
    Route::post('post/store', 'PostController@store')->name('store_post');
    Route::post('destroy/{id}', 'PostController@destroy')->name('destroy_post');


    //User
    Route::get('user', 'UserController@index')->name('index_user');
    Route::post('destroy/{id}', 'UserController@destroy')->name('destroy_user');

    //Feedback
    Route::get('feedback', 'FeedbackController@index')->name('index_feedback');
    Route::get('feedback/destroy/{id}', 'FeedbackController@destroy')->name('destroy_feedback');

    //Comment
    Route::get('comment', 'CommentController@index')->name('index_comment');

    //Report
	Route::get('report', 'ReportController@index')->name('index_report');
    Route::get('report/destroy/{id}', 'ReportController@destroy')->name('destroy_report');

    //following	
  	Route::get('following', 'FollowingController@index')->name('index_following');
});
