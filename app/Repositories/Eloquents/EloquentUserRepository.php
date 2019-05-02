<?php

namespace App\Repositories\Eloquents;
use App\Contracts\Repositories\UserRepository;
use App\User;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

     public function all() {

        return $this->model->orderBy('id', 'DESC')->get();
    }

    public function paginate() {

    	return $this->model->orderBy('id', 'DESC')->paginate();
    }

    public function findBySlug($slug) {

        return $this->model->with(['posts'])->where('name', $slug)->first();
    }
}