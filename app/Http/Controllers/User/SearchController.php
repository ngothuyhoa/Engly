<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;
use App\Post;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
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
     public function query(Request $request)
    {
    	$title = config('blog.search');
        // queries to Algolia search index and returns matched records as Eloquent Models
        $posts = Post::search($request->search)->paginate();
         
        if ($request->ajax()) {
            return view(
                'page_user.post.post_paginate', compact('posts', 'title')
            );
        }

        return View('page_user.post.index', compact('posts', 'title'));
    }

    public function search(Request $request) {
        $title = config('blog.search');
        $search = $request->search;

        $posts = $this->postRepository->search($search);
        if ($request->ajax()) {
            return view(
                'page_user.post.post_paginate', compact('posts', 'title')
            );
        }

        return View('page_user.post.index', compact('posts', 'title'));
    }
}
