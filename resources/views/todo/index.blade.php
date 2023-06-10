@extends('layouts.layout')
@section('content')
    <button type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#new-task-modal">Добавить задачу
    </button>
    <div class="mt-3" id="todo-block">
        @foreach($todos as $todo)
            <div class="card">
                <div class="card-body">
                    <h4><strong>{{ $todo->name }}</strong></h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p>{{ $todo->body }}</p>
                        <div>
                            <a href="{{ $todo->image->getFullurl() }}" target="_blank">
                                <img src="{{ $todo->image->getFullurl() }}"
                                     loading="lazy"
                                     style="width: 150px; aspect-ratio: 1; object-fit: cover"
                                     alt="preview">
                            </a>
                        </div>
                    </div>
                    <div>
                        {{ $todo->tags->map(fn(\App\Models\Tag $tag) => "#".$tag->name)->implode(' ') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <x-modal.new-task :id="'new-task-modal'"/>
@endsection
