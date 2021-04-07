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
    
});
