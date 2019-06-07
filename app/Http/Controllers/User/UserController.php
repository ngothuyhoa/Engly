<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Notifications\UserFollowed;
use App\Events\HelloPusherEvent;
use Hash;

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
        /*$user = User::where('id', '!=', auth()->user()->id)->get();
        //dd($users);
        return view('page_user.user.index', compact('user'));*/
        return redirect('/');
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
            $follows = $auth->follows()->with('images')->get();
            $followers = $auth->followers()->with('images')->get();
            //dd($follower);
           
        } else {
            $user = $this->userRepository->findByUserName($username);
            $posts = $user->posts()->where('status', '1')->orderBy('id', 'DESC')->paginate();  
        }
        if ($request->ajax()) {
                return view(
                    'page_user.post.post_paginate', compact('posts', 'title', 'auth', 'postPublic', 'postDraft', 'follows', 'followers')
                );
            }
        
        return view('page_user.user.index', compact(['user', 'posts', 'title', 'auth', 'postPublic', 'postDraft', 'follows', 'followers']));
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

    public function profile($username) {
        $user = $this->userRepository->findByUserName($username);
        return view('page_user.user.profile', compact('user'));
    }

    public function updateProfile(Request $request, $username) {

        $user = $this->userRepository->findByUserName($username);
        
        $data = [
            'fullname' => $request->fullname,
        ];

        $this->userRepository->update($user->id, $data);

        if ($request->hasFile('image')) {       
            $Image = $request->file('image');       
            $ImageDesPath = public_path('/user_image');
                       
            if(($user->images)->count()){
                foreach ($user->images as $image) {
                    if(file_exists($image->url)){
                        $Image->move($ImageDesPath, substr($image->url,12));
                    } else {
                        $name = time(). '.' .$Image->getClientOriginalExtension();
                        $Image->move($ImageDesPath, $name);
                        $image = $this->userRepository->updateImage(
                        $user->id,
                        ['url' => '/user_image' . '/' . $name]
                        );
                    }   
                }
            }else {
                $name = time(). '.' .$Image->getClientOriginalExtension();
                $Image->move($ImageDesPath, $name);
                $image = $this->userRepository->createImage(
                $user->id,
                ['url' => '/user_image' . '/' . $name]
                );
            }
        }

        return redirect()->route('user_profile', ['username' => $username])->with("success","Cập nhật thành công!");   
    }

    public function showChangePasswordForm(){
        return view('auth.passwords.changepassword');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->route('user_profile', ['username' => Auth::user()->username])->with("success","Password changed successfully !");
    }
}
