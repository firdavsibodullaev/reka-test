@extends('layouts.layout')
@section('content')
    <button type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#new-task-modal">Добавить задачу
    </button>
    <x-modal.new-task :id="'new-task-modal'"/>
@endsection
