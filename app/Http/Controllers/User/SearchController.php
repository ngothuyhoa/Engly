<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class SearchController extends Controller
{
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
}
