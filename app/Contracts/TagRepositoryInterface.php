<?php

namespace App\Contracts;

use App\Models\Tag;

interface TagRepositoryInterface
{
    public function findOrCreate(string $name): Tag;
}
