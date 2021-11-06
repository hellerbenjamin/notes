<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ModelRepositoryInterface
{
    public function find($id): ?Model;

    public function findBy(string $column, $operator = null, $value = null, $boolean = 'and'): Collection;

    public function create(array $data): Model;

    public function update(int $id, array $data): Model;

    public function delete(int $id): bool;
}
