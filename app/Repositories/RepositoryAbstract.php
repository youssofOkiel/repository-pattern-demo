<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\NoModelDefined;
use Illuminate\Database\Eloquent\Model;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected Model $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function all()
    {
        return $this->model::all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findWhere($column, $value)
    {
        return $this->model->where($column, $value)->get();
    }

    public function paginate($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $properties)
    {
        return $this->model->create($properties);
    }

    public function update($id, array $properties)
    {
        return $this->find($id)->update($properties);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    protected function resolveModel()
    {
        if (!method_exists($this, 'model')) {
            throw new NoModelDefined('No model defined !');
        }

        return app()->make($this->model());
    }
}
