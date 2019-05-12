<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

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
        //
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
}
