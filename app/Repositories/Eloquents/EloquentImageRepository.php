<?php

namespace App\Repositories\Eloquents;

use App\Contracts\Repositories\ImageRepository;
use App\Image;

class EloquentImageRepository extends EloquentBaseRepository implements ImageRepository
{
    public function __construct(Image $model)
    {
        $this->model = $model;
    }

}
