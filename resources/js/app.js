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

    //Confirm delte product
    $(".btn_delete_product").on("click", function () {
        var product_id = $(this).data('id');
        var delete_msg =  $(this).data('delete_msg');
        //Confirm delete action
        if (confirm(delete_msg)) {
            $('#delete_product_' + product_id).submit();
        }
    });

    //Confirm delete image
    $(".btn_delete_image").on("click", function () {
        let image_id = $(this).data('id');
        let delete_msg =  $(this).data('delete_msg');
        //Confirm delete action
        if (confirm(delete_msg)) {
            $('#delete_image_' + image_id).submit();
        }
    });
    
    //Add to cart button
    $(".btn_add_product_to_cart").on("click", function () {
        let product_id = $(this).data('id');        
        $('#add_product_' + product_id).submit();        
    });

    //Confirm remove from cart
    $(".btn_remove_from_cart").on("click", function () {
        let product_id = $(this).data('id');
        let delete_msg =  $(this).data('delete_msg');
        //Confirm delete action
        if (confirm(delete_msg)) {
            $('#remove_from_cart_' + product_id).submit();
        }
    });

    //Update cart
    $(".btn_update_cart").click(function (e) {
        e.preventDefault();
        let ele = $(this);
            $.ajax({
            url: ele.attr("data-url-target"),
            method: "patch",
            data: {
                _token: ele.attr("data-csrf-token"),
                id: ele.attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            }  
        });           
    });
    
    //Increase or deacrease quantity
    let quantitiy = 1;
    $('.quantity-right-plus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        let quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
    });

    $('.quantity-left-minus').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        let quantity = parseInt($('#quantity').val());
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
    });

    //Order button
    $("#btn_order").on("click", function () {
        if ($("#address_input").val() != "") {
            $("#order_form").submit();
        } else {        
            $("#address_input").focus();
        }
    });
});
