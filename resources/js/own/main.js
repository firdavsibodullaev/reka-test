import $ from 'jquery';
import toastr from 'toastr';
import getHtml from './todo.js';
import {Modal} from "bootstrap";

$('.image-input').on('change', function () {
    let file = $(this).prop('files')[0];
    let preview = $('.image-preview');
    let link = URL.createObjectURL(file);

    preview.attr('src', link);
    preview.parent().attr('href', link);
    preview.parents('.image-preview-block').removeClass('d-none');

    $(this).parent().addClass('d-none');
});

$('.image-preview-remove').on('click', function () {
    let preview = $('.image-preview');
    let imageInput = $('.image-input');

    preview.attr('src', '');
    preview.parent().attr('href', '');
    preview.parents('.image-preview-block').addClass('d-none');

    imageInput.val('');
    imageInput.parent().removeClass('d-none');
});

$('.todo-create-form-save').click(async function () {
    let form = $('#todo-create-form');
    let file = form.find('[name=image]').prop('files')[0];
    let fd = new FormData();

    fd.set('name', form.find('[name=name]').val());
    fd.set('body', form.find('[name=body]').val());
    fd.set('tag', form.find('[name=tag]').val());
    fd.set('image', file);

    let response = await fetch(`${location.origin}`, {
        method: 'post',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        },
        body: fd
    });

    let data = await response.json();

    if (response.status === 422) {
        for (let error in data.errors) {
            for (let message of data.errors[error]) {
                toastr.error(message);
            }
        }
        return;
    }

    let html = getHtml(data.data);
    let modal = new Modal(document.querySelector('#new-task-modal'));

    $('#todo-block').append(html);
    modal.hide();
});

document.querySelector('#new-task-modal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('todo-create-form').reset();
    document.querySelector('.image-preview-remove').click();
});
