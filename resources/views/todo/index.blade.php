@extends('layouts.layout')
@section('content')
    <div class="my-3">
        <input type="text" class="form-control" id="search-input" placeholder="Поиск по названию">
    </div>
    <button type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#new-task-modal">Добавить задачу
    </button>
    <div class="mt-3" id="todo-block">
        @foreach($todos as $todo)
            <x-card.todo :todo="$todo"/>
        @endforeach
    </div>
    <x-modal.new-task :id="'new-task-modal'"/>
    <x-modal.edit-task :id="'edit-task-modal'"/>
    <x-modal.delete-task :id="'delete-task-modal'"/>
@endsection
