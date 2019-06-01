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

        return $this->model->where('is_super_admin', '0')->orderBy('id', 'DESC')->get();
    }

    public function paginate() {

    	return $this->model->orderBy('id', 'DESC')->paginate();
    }

    public function findByUserName($username) {

        return $this->model->with(['posts', 'images'])->where('username', $username)->first();
    }

    public function allAdmin() {

        return $this->model->where('is_super_admin', '1')->orderBy('id', 'DESC')->get();
    }

    public function createImage($id, $data = [])
    {
        return $this->model->find($id)->images()->create($data);
    }

    public function UpdateImage($id, $data = [])
    {
        return $this->model->find($id)->images()->update($data);
    }

}