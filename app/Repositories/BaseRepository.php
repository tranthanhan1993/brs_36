<?php 

namespace App\Repositories;

use Auth;

abstract class BaseRepository
{
    protected $model;

    public function getCurrentUser()
    {
        return Auth::user();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $data = $this->model->find($id);
        if (!$data) {
            throw new Exception(trans('message.find_error'));
        }

        return $data;
    }

    public function findBy($column, $option)
    {
        $data = $this->model->where($column, $option)->get();

        if (!$data) {
            throw new Exception(trans('message.create_error'));
        }

        return $data;
    }

    public function paginate($limit)
    {
        return $this->model->paginate($limit);
    }

    public function lists($column, $key = null)
    {
        return $this->model->orderBy($column)->pluck($column, $key);
    }
}

?>