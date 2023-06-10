<?php

namespace App\Http\Controllers;

use App\Contracts\TodoRepositoryInterface;
use App\Contracts\TodoServiceInterface;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Resources\TodoResource;

class TodoController extends Controller
{
    public function __construct(
        private readonly TodoRepositoryInterface $todoRepository,
        private readonly TodoServiceInterface    $todoService
    )
    {
    }

    /**
     * @return string
     */
    public function index(): string
    {
        $todos = $this->todoRepository->getList();

        return view('todo.index', compact('todos'))->render();
    }

    public function store(TodoStoreRequest $request): TodoResource
    {
        $todo = $this->todoService->create($request->validated());

        return TodoResource::make($todo);
    }
}
