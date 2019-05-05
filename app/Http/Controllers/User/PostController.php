<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use App\Tag;
use App\Post;

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
        //dd(Auth::user());
        /*$this->validate(
        );*/
        //dd($request->all());
        //check tag exists and insert
        $idTags= [];
        $nameTags = explode(',', $request->tag);
        foreach ($nameTags as $nameTag) {
            $tag = Tag::where('name', '=', $nameTag)->first(); 
            if ($tag === null) {
                $tag = $this->tagRepository->store([
                    'name' => $nameTag,
                    'slug' => str_slug($nameTag)
                ]);
            }   
            array_push($idTags, $tag->id);
        }
        //insert post
        $data = [
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'view' => 0,
            'vote' => 0,
            'slug' => str_slug($request->title),
            'status' => $request->status
        ];

        $post = $this->postRepository->store($data);

        // insert image
        if ($request->hasFile('image')) {
            
            $Image = $request->file('image');
            $name = time(). '.' .$Image->getClientOriginalExtension();
            $ImageDesPath = public_path('/post_image');
            $Image->move($ImageDesPath, $name);

            $image = $this->postRepository->createImage(
                $post->id,
                ['url' => '/post_image' . '/' . $name]
            );
        }

        $post->tags()->sync($idTags);
        

        return redirect()->route('post_detail', ['slug' => $data['slug']]);
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
