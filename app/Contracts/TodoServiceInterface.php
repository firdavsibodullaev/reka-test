<?php

namespace App\Contracts;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

interface TodoServiceInterface
{
    public function create(array $payload): Todo;

    public function update(Todo $todo, array $payload): Todo;

    public function delete(Todo $todo): bool;

    public function search(string $q): Collection;
}
