<?php

namespace App\Repositories\Eloquents;
use App\Contracts\Repositories\PostRepository;
use App\Post;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
{
    protected $model;
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function paginate() {

    	return $this->model->with(['user.images', 'images'])->where('status', 1)->orderBy('id', 'DESC')->paginate();
    }

    public function all() {

    	return $this->model->with(['images', 'user'])->orderBy('id', 'DESC')->get();
    }

    public function findBySlug($slug) {

        return $this->model->with(['images', 'user.roles', 'tags', 'comments'])->where('slug', $slug)->orderBy('id', 'DESC')->first();
    }


    public function findByFeaturedNews() {

        return $this->model->with(['user.images', 'images'])->orderBy('view', 'DESC')->paginate();
    }

    public function AllFeaturedNews()
    {
        return $this->model->with(['user.images', 'images'])->orderBy('view', 'DESC')->paginate();
    }

    public function createImage($id, $data = [])
    {
        return $this->model->find($id)->images()->create($data);
    }

    public function UpdateImage($id, $data = [])
    {
        return $this->model->find($id)->images()->update($data);
    }


    public function search($search) {
        return $this->model->with(['user', 'images'])->orwhere('title', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->orwhereHas('user', function ($query) use ($search){
            $query->where('username', 'like', '%'.$search.'%');
        })->paginate();
    }
    
}