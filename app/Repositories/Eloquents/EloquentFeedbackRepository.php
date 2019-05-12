<?php

namespace App\Repositories\Eloquents;
use App\Contracts\Repositories\FeedbackRepository;
use App\Feedback;

class EloquentFeedbackRepository extends EloquentBaseRepository implements FeedbackRepository
{
    protected $model;
    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }

    public function paginate() {

    	return $this->model->orderBy('id', 'DESC')->paginate();
    }

    public function all() {

    	return $this->model->with('user')->orderBy('id', 'DESC')->get();
    }

    
}