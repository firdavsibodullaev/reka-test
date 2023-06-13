<?php

namespace App\Repositories;

use App\Contracts\TodoRepositoryInterface;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoRepository implements TodoRepositoryInterface
{
    public function getList(): Collection
    {
        return Todo::query()
            ->with(['user', 'tags', 'image'])
            ->where('user_id', auth()->id())
            ->orderByDesc('id')
            ->get();
    }

    public function create(array $payload): Todo
    {
        $todo = new Todo($payload);
        $todo->save();

        return $todo;
    }

    public function update(Todo $todo, array $payload)
    {
        $todo->fill($payload);
        $todo->save();

        return $todo;
    }

    public function delete(Todo $todo): bool
    {
        return $todo->delete();
    }
}
