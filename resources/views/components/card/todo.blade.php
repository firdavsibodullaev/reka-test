<div class="card" id="card-{{ $todo->id }}">
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
            {!! get_tags($todo->tags) !!}
        </div>
    </div>
    <div class="card-footer">
        <button type="button"
                class="btn btn-warning btn-sm open-edit-task-modal"
                data-id="{{ $todo->id }}"
                data-bs-target="#edit-task-modal">Изменить
        </button>
        <button type="button"
                class="btn btn-danger btn-sm open-delete-task-modal"
                data-id="{{ $todo->id }}"
                data-bs-target="#edit-task-modal">Удалить
        </button>
    </div>
</div>
