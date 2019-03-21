<?php

namespace App\Repositories\Eloquents;
use App\Contracts\Repositories\TagRepository;
use App\Tag;

class EloquentTagRepository extends EloquentBaseRepository implements TagRepository
{
    protected $model;
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function paginate() {

    	return $this->model->orderBy('id', 'DESC')->paginate();
    }
}