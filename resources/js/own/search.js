import $ from "jquery";
import getHtml from "./template/todo.js";

$("#search-input").on('input', function () {
    let q = $(this).val();
    $('#todo-block').html('');

    $.ajax({
        url: `${location.origin}/search?q=${q}`,
        method: 'get',
        success({data}) {
            for (let card of data) {
                let cardItem = getHtml(card);
                $('#todo-block').append(cardItem);
            }
        }
    })
});
