<?php

namespace App\Contracts;

use App\Models\Tag;

interface TagServiceInterface
{
    public function getTagIdsFromString(string $tag): array;
}
