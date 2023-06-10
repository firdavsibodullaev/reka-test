<?php

namespace App\Repositories;

use App\Contracts\TagRepositoryInterface;
use App\Models\Tag;

class TagRepository implements TagRepositoryInterface
{
    public function findOrCreate(string $name): Tag
    {
        /** @var Tag $tag */
        $tag = Tag::query()->firstOrCreate(['name' => $name]);

        return $tag;
    }
}
