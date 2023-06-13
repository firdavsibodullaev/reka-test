<?php

namespace App\Contracts;

use App\Models\Todo;

interface TodoServiceInterface
{
    public function create(array $payload): Todo;

    public function update(Todo $todo, array $payload): Todo;

    public function delete(Todo $todo): bool;
}
