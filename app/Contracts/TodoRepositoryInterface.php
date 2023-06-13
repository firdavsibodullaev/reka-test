<?php

namespace App\Contracts;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

interface TodoRepositoryInterface
{
    public function getList(): Collection;

    public function create(array $payload): Todo;

    public function update(Todo $todo, array $payload);

    public function delete(Todo $todo): bool;
}
