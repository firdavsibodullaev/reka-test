<?php

namespace App\Http\Controllers;

use App\Contracts\TodoRepositoryInterface;
use App\Contracts\TodoServiceInterface;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Response;

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
        $todos = $this->todoRepository->getList(tag: request('tag', ''));

        return view('todo.index', compact('todos'))->render();
    }

    public function show(Todo $todo): TodoResource
    {
        return TodoResource::make($todo->load('tags'));
    }

    public function store(TodoRequest $request): TodoResource
    {
        $todo = $this->todoService->create($request->validated());

        return TodoResource::make($todo);
    }

    public function update(Todo $todo, TodoRequest $request): TodoResource
    {
        $todo = $this->todoService->update($todo, $request->validated());

        return TodoResource::make($todo);
    }

    public function destroy(Todo $todo): Response
    {
        $this->todoService->delete($todo);

        return response("", 204);
    }

    public function search()
    {
        $todos = $this->todoService->search(request('q', ''));

        return TodoResource::collection($todos);
    }
}
