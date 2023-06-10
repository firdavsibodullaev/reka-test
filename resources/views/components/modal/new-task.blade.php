<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $id }}Label">Новая задача</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('todo.store') }}"
                      method="post"
                      id="todo-create-form"
                      autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text"
                               class="form-control"
                               placeholder="Введите название"
                               name="name"
                               required
                               id="name">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Тело</label>
                        <textarea name="body"
                                  id="body"
                                  rows="5"
                                  class="form-control"
                                  placeholder="Введите тело"
                                  required></textarea>
                    </div>
                    <div class="mb-3 d-none image-preview-block">
                        <div class="d-flex flex-column">
                            <a href="" target="_blank">
                                <img src=""
                                     alt="preview"
                                     class="image-preview"
                                     style="width: 150px; aspect-ratio: 1; object-fit: cover">
                            </a>
                            <div class="mt-3">
                                <button class="image-preview-remove btn btn-danger btn-sm"
                                        type="button">Убрать
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Фотография</label>
                        <input type="file"
                               accept="image/jpeg, image/jpg, image/png"
                               class="form-control image-input"
                               id="image"
                               name="image"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="tag" class="form-label">
                            Теги
                        </label>
                        <input type="text"
                               class="form-control"
                               name="tag"
                               placeholder="Введите теги"
                               id="tag">
                        <div class="text-secondary mt-1">Введите теги через пробел</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary todo-create-form-save">Сохранить</button>
            </div>
        </div>
    </div>
</div>
