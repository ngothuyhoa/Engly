<?php

namespace App\Repositories\Eloquents;
use App\Contracts\Repositories\ReportRepository;
use App\Report;

class EloquentReportRepository extends EloquentBaseRepository implements ReportRepository
{
    protected $model;
    public function __construct(Report $model)
    {
        $this->model = $model;
    }

    public function paginate() {

    	return $this->model->orderBy('id', 'DESC')->paginate();
    }

    public function all() {

    	return $this->model->orderBy('id', 'DESC')->with(['user','post'])->get();
    }

    
}