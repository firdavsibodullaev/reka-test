<?php

namespace App\Services;

use App\Contracts\MediaLibraryRepositoryInterface;
use App\Contracts\TagServiceInterface;
use App\Contracts\TodoRepositoryInterface;
use App\Contracts\TodoServiceInterface;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TodoService implements TodoServiceInterface
{
    public function __construct(
        private readonly MediaLibraryRepositoryInterface $libraryRepository,
        private readonly TagServiceInterface             $tagService,
        private readonly TodoRepositoryInterface         $todoRepository
    )
    {
    }

    public function search(string $q): Collection
    {
        $q = Str::lower($q);

        return $this->todoRepository->getList($q);
    }

    public function create(array $payload): Todo
    {
        return DB::transaction(function () use ($payload) {

            $payload['user_id'] = auth()->id();

            $todo = $this->todoRepository->create($payload);

            $this->libraryRepository->addMedia($todo, $payload['image']);

            $tag_ids = $this->tagService->getTagIdsFromString($payload['tag']);

            $todo->tags()->sync($tag_ids);

            return $todo->load(['user', 'image', 'tags']);
        });
    }

    public function update(Todo $todo, array $payload): Todo
    {
        return DB::transaction(function () use ($todo, $payload) {
            $todo = $this->todoRepository->update($todo, $payload);

            if (isset($payload['image'])) {
                $this->libraryRepository->deleteMedia($todo);
                $this->libraryRepository->addMedia($todo, $payload['image']);
            }

            $tag_ids = $this->tagService->getTagIdsFromString($payload['tag']);

            $todo->tags()->sync($tag_ids);

            return $todo->load(['user', 'image', 'tags']);
        });
    }

    public function delete(Todo $todo): bool
    {
        return DB::transaction(function () use ($todo) {
            $todo->tags()->detach();

            return $this->todoRepository->delete($todo);
        });
    }
}
