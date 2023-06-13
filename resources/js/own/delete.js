import {Modal} from "bootstrap";
import $ from "jquery";
import toastr from "toastr";

$('.open-delete-task-modal').click(function () {
    let modalElement = document.querySelector('#delete-task-modal');
    let modal = Modal.getOrCreateInstance(modalElement);
    let id = $(this).attr('data-id');
    $(modalElement).attr('data-id', id);
    modal.show();

});

$('.todo-delete-form-save').click(function () {
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
