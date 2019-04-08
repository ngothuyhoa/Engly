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

    	return $this->model->with(['user.images', 'images'])->orderBy('id', 'DESC')->paginate();
    }

    public function all() {

    	return $this->model->with(['images', 'user'])->orderBy('id', 'DESC')->get();
    }

    public function findBySlug($slug) {

        return $this->model->with(['images', 'user', 'tags'])->where('slug', $slug)->first();
    }

    public function findByFeaturedNews() {

        return $this->model->with(['user.images', 'images'])->orderBy('view', 'DESC')->paginate();
    }

    public function AllFeaturedNews()
    {
        return $this->model->with(['user.images', 'images'])->orderBy('view', 'DESC')->paginate();
    }

    
}