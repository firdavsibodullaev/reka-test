import {Modal} from "bootstrap";
import $ from "jquery";
import toastr from "toastr";

$(document).on('click', '.open-delete-task-modal', function () {
    let modalElement = document.querySelector('#delete-task-modal');
    let modal = Modal.getOrCreateInstance(modalElement);
    let id = $(this).attr('data-id');
    $(modalElement).attr('data-id', id);
    modal.show();

});

$(document).on('click', '.todo-delete-form-save', function () {
    let modalElement = document.querySelector('#delete-task-modal');
    let modal = Modal.getInstance(modalElement);
    let id = $(modalElement).attr('data-id');

    $.ajax({
        url: `${location.origin}/${id}`,
        method: 'delete',
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        },
        success() {
            toastr.success('Удалено');
            modal.hide();
            $(`#card-${id}`).remove();
        }
    });
});

document.querySelector('#delete-task-modal').addEventListener('hidden.bs.modal', function () {
    $('#delete-task-modal').attr('data-id', '');
});
