<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;

class PostController extends Controller
{
    protected $postRepository;
    protected $tagRepository;
    
    public function __construct(
        PostRepository $postRepository,
        TagRepository $tagRepository
    ) {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = config('blog.list_post');
        $posts = $this->postRepository->paginate();

        if ($request->ajax()) {
            return view(
                'page_user.post.post_paginate', compact('posts', 'title')
            );
        }

        return View('page_user.post.index', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page_user.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->postRepository->findBySlug($slug);
        
        /*foreach ($post->tags as $tag) {
           dump($tag);
        }*/

        return View('page_user.post.detail', compact('post'));
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

    public function findByTag(Request $request, $slug)
    {
        $tag = $this->tagRepository->findBySlug($slug);
        $title = 'Result Search Tag: '. $tag->name;

        $posts = $tag->posts()->paginate();
        if ($request->ajax()) {
            return view(
                'page_user.post.post_paginate', compact('posts', 'title')
            );
        }

        return View('page_user.post.index', compact('posts', 'title'));
    }

    public function indexFeatured(Request $request)
    {
        $title = config('blog.featured_post');
        $posts = $this->postRepository->AllFeaturedNews();

        if ($request->ajax()) {
            return view(
                'page_user.post.post_paginate', compact('posts', 'title')
            );
        }

        return View('page_user.post.index', compact('posts', 'title'));
    }
}
