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
            ->where('user_id', auth()->id())
            ->get();
    }
}
