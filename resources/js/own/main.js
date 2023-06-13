import $ from "jquery";

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
