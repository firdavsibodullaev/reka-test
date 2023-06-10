<?php

namespace App\Services;

use App\Contracts\TagRepositoryInterface;
use App\Contracts\TagServiceInterface;
use App\Models\Tag;

class TagService implements TagServiceInterface
{
    public function __construct(private readonly TagRepositoryInterface $tagRepository)
    {
    }

    public function getTagIdsFromString(string $tag): array
    {
        $tag_ids = [];
        foreach (explode(" ", $tag) as $tag) {
            $tag_ids[] = $this->tagRepository->findOrCreate($tag)->id;
        }

        return $tag_ids;
    }
}
