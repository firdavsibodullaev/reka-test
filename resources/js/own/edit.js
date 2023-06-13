import $ from "jquery";
import {Modal} from "bootstrap";
import toastr from "toastr";

$('.open-edit-task-modal').click(function () {
    let modalElement = document.querySelector('#edit-task-modal');
    let modal = Modal.getOrCreateInstance(modalElement);
    let id = $(this).attr('data-id');
    $.ajax({
        url: `${location.origin}/${id}`,
        method: 'get',
        success({data}) {
            $(modalElement).find('#modal-task-name').text(data.name);
            $(modalElement).find('#edit_name').val(data.name);
            $(modalElement).find('#edit_body').val(data.body);
            $(modalElement).find('#edit_image').parent().addClass('d-none');
            $(modalElement).find('#edit_tag').val(parseTags(data.tags))
            $(modalElement).find('.image-preview-block').removeClass('d-none');
            $(modalElement).find('.image-preview').attr('src', data.image);
            $(modalElement).find('#todo-edit-form').attr('action', `${location.origin}/${data.id}`);

            modal.show();
        }
    });
});

function parseTags(tags) {
    return tags.map((tag) => tag.name).join(' ');
}

$('.todo-edit-form-save').click(function () {
    let form = $('#todo-edit-form');
    let file = form.find('[name=image]').prop('files')[0];
    let fd = new FormData();
    let modal = Modal.getInstance(document.querySelector('#edit-task-modal'));

    fd.set('name', form.find('[name=name]').val());
    fd.set('body', form.find('[name=body]').val());
    fd.set('tag', form.find('[name=tag]').val());
    fd.set('image', file);

    $.ajax({
        url: form.attr('action'),
        method: 'put',
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        },
        contentType: false,
        processData: false,
        data: fd,
        success(response) {
            toastr.success('Изменено')
            modal.hide();
        }, error(response) {
            let data = response.responseJSON;
            if (response.status === 422) {
                for (let error in data.errors) {
                    for (let message of data.errors[error]) {
                        toastr.error(message);
                    }
                }
            }
        }
    });
});

document.querySelector('#edit-task-modal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('todo-edit-form').reset();
    document.getElementById('todo-edit-form').attr('action', '');
});
