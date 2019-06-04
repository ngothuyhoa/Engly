<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\PostRepository;
use App\Contracts\Repositories\TagRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Tag;
use App\Post;
use App\Follow;
use App\User;

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
        $notification = array(
            'message' => 'Thêm bài viết thành công!',
            'alert-type' => 'success'
        );

        return redirect()->route('post_detail', ['slug' => $data['slug']])->with($notification);
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
        //dd($post);
        Event::fire('posts.view', $post);
        
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
    public function edit($slug)
    {
        $post = $this->postRepository->findBySlug($slug);
        $tags = ($post->tags);
        $arrTags = [];
        foreach ($tags as $tag) {
          // $arrTag.push($tag->name);
           array_push($arrTags, $tag->name);
        }
        $arrTags = (implode(',',$arrTags));
        return view('page_user.post.update', compact('post', 'arrTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = $this->postRepository->findBySlug($slug);
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
        
        $data = [
            'user_id' => $post->user_id,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => str_slug($request->title),
            'status' => $request->status
        ];

        $this->postRepository->update($post->id, $data);

        if ($request->hasFile('image')) {       
            $Image = $request->file('image');       
            $ImageDesPath = public_path('/post_image');
                       
            if(($post->images)->count()){
                foreach ($post->images as $image) {
                    $Image->move($ImageDesPath, substr($image->url,12));
                }
            }else {
                $name = time(). '.' .$Image->getClientOriginalExtension();
                $Image->move($ImageDesPath, $name);
                $image = $this->postRepository->createImage(
                $post->id,
                ['url' => '/post_image' . '/' . $name]
                );
            }

        }
        $post->tags()->sync($idTags);

        $notification = array(
            'message' => 'Sửa bài viết thành công!',
            'alert-type' => 'success'
        );

        return redirect()->route('post_detail', ['slug' => $data['slug']])->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepository->delete($id);
        $notification = array(
            'message' => 'Xóa bài viết thành công!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('user_detail', ['username' => Auth::user()->username])->with($notification);
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

    public function draft(Request $request, $id) {
        $status = $this->postRepository->update($id,[
            'status' => '0'
        ]);
        $post = $this->postRepository->findOrFail($id);
        return redirect()->route('post_detail', ['slug' => $post->slug]);
    }

    public function postPublic(Request $request, $id) {
        $status = $this->postRepository->update($id,[
            'status' => '1'
        ]);
        $post = $this->postRepository->findOrFail($id);
        return redirect()->route('post_detail', ['slug' => $post->slug]);
    }

    public function follow(Request $request) {
        $title = config('blog.list_post');
        $id = Auth::user()->id;
        $users = User::with('posts')->find($id)->follows;

        //Lay ra user dang theo doi
        $users = Follow::with(['user.posts'])->where('user_id', $id)->get();
        //tao mang id user dang theo doi
        $userId=[];
        foreach ($users as $user) {
            array_push($userId, $user->follows_id);
        }

        //Lay ra post voi mang user_id
        $posts = Post::with(['user', 'images'])->where(function($q) use ($userId){
            $q->whereIn('user_id', $userId);
        })->orderBy('id', 'DESC')->paginate();
        if ($request->ajax()) {
            return view(
                'page_user.post.post_paginate', compact('posts', 'title')
            );
        }

        return View('page_user.post.index', compact('posts', 'title'));
    }

    


    
}
