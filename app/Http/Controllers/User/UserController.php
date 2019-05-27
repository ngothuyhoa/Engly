<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Notifications\UserFollowed;
use App\Events\HelloPusherEvent;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        /*$test =  $this->userRepository->findOrFail(Auth::user()->id)->with();
        dd($test);*/
        $users = User::where('id', '!=', auth()->user()->id)->get();
        //dd($users);
        return view('page_user.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $username)
    {
        $title = config('blog.list_post');

        $auth = Auth::user();
        if(Auth::check() && $auth->username == $username){  
            $username = $auth->username;
            $user = $this->userRepository->findByUserName($username);
            $posts = $auth->posts()->orderBy('id', 'DESC')->paginate();
            $postPublic = $auth->posts()->orderBy('id', 'DESC')->where('status', 1)->paginate();
            $postDraft = $auth->posts()->orderBy('id', 'DESC')->where('status', 0)->paginate();
           
        } else {
            $user = $this->userRepository->findByUserName($username);
            $posts = $user->posts()->where('status', '1')->orderBy('id', 'DESC')->paginate();  
        }
        if ($request->ajax()) {
                return view(
                    'page_user.post.post_paginate', compact('posts', 'title', 'auth', 'postPublic', 'postDraft')
                );
            }
        
        return view('page_user.user.index', compact(['user', 'posts', 'title', 'auth', 'postPublic', 'postDraft']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function follow(User $user)
    {
        $follower = auth()->user();
        
        if(!$follower->isFollowing($user->id)) {
            $follower->follow($user->id);

            // sending a notification
            $user->notify(new UserFollowed($follower));

            return back()->withSuccess("You are now friends with {$user->name}");
        }
        return back()->withError("You are already following {$user->name}");
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return back()->withSuccess("You are no longer friends with {$user->name}");
        }
        return back()->withError("You are not following {$user->name}");
    }

    public function notifications()
    { 
       
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }

    /*public function getPusher() {
        //event(new HelloPusherEvent("Hi, I'm Trung Quân. Thanks for reading my article!"));
        var_dump('hello');
        //return view("demo-pusher");
    }

    public function fireEvent(){
     // Truyền message lên server Pusher
    event(new HelloPusherEvent("Hi, I'm Trung Quân. Thanks for reading my article!"));
     return "Message has been sent.";
    }*/
}
