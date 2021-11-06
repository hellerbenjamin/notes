<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class ModelRepository
{

    public function __construct(protected Model $model)
    {
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function findBy(string $column, $operator = null, $value = null, $boolean = 'and'): Collection
    {
        return $this->model->where($column, $operator, $value, $boolean)->get();
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Model
    {
        $model = $this->model->find($id);
        $model->update($data);

        return $model;
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }

}

