require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function (){

    $(".cart_quantity").each(function () {
        let productId = $(this).attr('data-id');
        let oldQuantity = $(`#cart_quantity_${ productId }`).val();
        
        $(this).on('change', function(){
            let token = $('input[name="_token"]').val();
            let orderTotal = $('#order_total').html();
            let subTotal = $(`#sub_total_${ productId }`).html();
            let newQuantity = $(`#cart_quantity_${ productId }`).val();

            $.ajax({
                url:  '/cart/update-quantity',
                method : 'post',
                data: {
                    _token : token,
                    product_id : productId,
                    new_quantity : newQuantity,
                },
    
                success: function (data) {                                                         
                    let changedSubTotal = (parseInt(data['quantity']) - parseInt(oldQuantity)) * parseFloat(data['price']);                    
                    subTotal = parseFloat(subTotal) + changedSubTotal;
                    orderTotal = parseFloat(orderTotal) + changedSubTotal;
                    
                    $(`#sub_total_${ productId }`).html(subTotal);
                    $('#order_total').html(orderTotal);
                    oldQuantity = newQuantity;
                }
            });            
        });
    });
    
    //Buy now
    $('.btn_buy_now').on("click", function (e) {
        let productId = $(this).attr('data-id');
        $(`#buy_product_${ productId }`).submit();
    });

    //Add to cart with quantity
    $('.btn_add_products_to_cart').on('click', function(e) {
        e.preventDefault();
         
        let quantity = $("#quantity").val();
        let token = $('input[name="_token"]').val();
        let productId = $(this).attr('data-id');

        $.ajax({
            url: '/products/add-to-cart',            
            method: 'post',
            data : {
                _token: token,
                quantity: quantity,
                product_id: productId,
            },
            success: function() {
                alert('Add product to cart successfully.');
            }
        });
    });    
});
