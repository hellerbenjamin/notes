<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 *
 */
abstract class ModelRepository
{

    /**
     * @param  Model  $model
     */
    public function __construct(protected Model $model)
    {
    }

    /**
     * @param $id
     *
     * @return Model|null
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param  string  $column
     * @param  null  $operator
     * @param  null  $value
     * @param  string  $boolean
     *
     * @return Collection
     */
    public function findBy(string $column, $operator = null, $value = null, $boolean = 'and'): Collection
    {
        return $this->model->where($column, $operator, $value, $boolean)->get();
    }

    /**
     * @param  array  $data
     *
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param  int  $id
     * @param  array  $data
     *
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        $model = $this->model->find($id);
        $model->update($data);

        return $model;
    }

    /**
     * @param  int  $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }

}

