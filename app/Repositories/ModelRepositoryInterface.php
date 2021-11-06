<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 *
 */
interface ModelRepositoryInterface
{
    /**
     * @param $id
     *
     * @return Model|null
     */
    public function find($id): ?Model;

    /**
     * @param  string  $column
     * @param  null  $operator
     * @param  null  $value
     * @param  string  $boolean
     *
     * @return Collection
     */
    public function findBy(string $column, $operator = null, $value = null, $boolean = 'and'): Collection;

    /**
     * @param  array  $data
     *
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param  int  $id
     * @param  array  $data
     *
     * @return Model
     */
    public function update(int $id, array $data): Model;

    /**
     * @param  int  $id
     *
     * @return bool
     */
    public function delete(int $id): bool;
}
