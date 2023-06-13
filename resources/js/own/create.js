import $ from 'jquery';
import toastr from 'toastr';
import getHtml from './template/todo.js';
import {Modal} from "bootstrap";

$('.todo-create-form-save').click(function () {
    let form = $('#todo-create-form');
    let file = form.find('[name=image]').prop('files')[0];
    let fd = new FormData();
    let modal = Modal.getInstance(document.querySelector('#new-task-modal'));

    fd.set('name', form.find('[name=name]').val());
    fd.set('body', form.find('[name=body]').val());
    fd.set('tag', form.find('[name=tag]').val());
    fd.set('image', file);

    $.ajax({
        url: location.origin,
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        },
        contentType: false,
        processData: false,
        data: fd,
        success(response) {
            let html = getHtml(response.data);
            $('#todo-block').prepend(html);
            toastr.success('Создано')
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

document.querySelector('#new-task-modal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('todo-create-form').reset();
    document.querySelector('.image-preview-remove').click();
});
