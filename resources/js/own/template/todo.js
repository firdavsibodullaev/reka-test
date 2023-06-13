function getHtml(data) {
    return `<div class="card" id="card-${data.id}">
                <div class="card-body">
                    <h4><strong>${data.name}</strong></h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p>${data.body}</p>
                        <div>
                            <a href="${data.image}" target="_blank">
                                <img src="${data.image}"
                                     loading="lazy"
                                     style="width: 150px; aspect-ratio: 1; object-fit: cover"
                                     alt="preview">
                            </a>
                        </div>
                    </div>
                    <div>
                    ${getTags(data.tags)}
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button"
                            class="btn btn-warning btn-sm open-edit-task-modal"
                            data-id="${data.id}"
                            data-bs-target="#edit-task-modal">Изменить
                    </button>
                    <button type="button"
                            class="btn btn-danger btn-sm open-delete-task-modal"
                            data-id="${data.id}"
                            data-bs-target="#edit-task-modal">Удалить
                    </button>
                </div>
            </div>`;
}

function getTags(tags) {
    return tags.map((tag) => `#${tag.name}`).join(' ');
}


export default getHtml
