<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface TodoRepositoryInterface
{
    public function getList(): Collection;
}
