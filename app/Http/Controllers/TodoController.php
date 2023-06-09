<?php

namespace App\Http\Controllers;

use App\Contracts\TodoRepositoryInterface;

class TodoController extends Controller
{
    public function __construct(private TodoRepositoryInterface $todoRepository)
    {
    }

    /**
     * @return string
     */
    public function index(): string
    {
        $list = $this->todoRepository->getList();

        return view('todo.index', compact('list'))->render();
    }
}
