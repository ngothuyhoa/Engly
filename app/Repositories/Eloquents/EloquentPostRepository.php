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
}