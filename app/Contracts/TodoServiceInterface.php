<?php

namespace App\Contracts;

use App\Models\Todo;

interface TodoServiceInterface
{
    public function create(array $payload): Todo;
}
