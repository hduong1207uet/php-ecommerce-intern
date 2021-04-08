require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function () {
    //Log out button
    $(".btn-logout").on("click", function (event) {
        event.preventDefault();
        $('#logout-form').submit();
    });
    
    //Go back button
    $(".btn_go_back").on("click", function () {
        window.history.back();
    });
    
    //Confirm delete
    $(".btn_delete_category").on("click", function () {
        var category_id = $(this).data('id');
        var delete_msg =  $(this).data('delete_msg');
        //Confirm delete action
        if (confirm(delete_msg)) {
            $('#delete_category_'+category_id).submit();
        }
    });
});
