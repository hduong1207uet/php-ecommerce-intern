require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function (){
    let domain = window.location.hostname ;
    let port = window.location.port;
    let fullDomain = `${ domain }:${ port }`;
        
    let changeQuantityRoute = `http://${ fullDomain }/cart/update-quantity`;

    $(".cart_quantity").each(function () {
        let product_id = $(this).attr('data-id');
        let old_quantity = $("#cart_quantity_" + product_id).val();
        
        $(this).on('change', function(){
            let token = $('input[name="_token"]').val();
            let order_total = $('#order_total').html();
            let sub_total = $('#sub_total_'+product_id).html();
            let new_quantity = $("#cart_quantity_" + product_id).val();

            $.ajax({
                url:  changeQuantityRoute,
                method : 'post',
                data: {
                    _token : token,
                    product_id : product_id,
                    new_quantity : new_quantity,
                },
    
                success: function (data) {
                    // console.log(data);                                       
                    let changedSubTotal = (parseInt(data['quantity']) - parseInt(old_quantity)) * parseFloat(data['price']);
                    // console.log(changedSubTotal);
                    sub_total = parseFloat(sub_total) + changedSubTotal;
                    order_total = parseFloat(order_total) + changedSubTotal;
                    
                    $('#sub_total_'+product_id).html(sub_total);
                    $('#order_total').html(order_total);
                    old_quantity = new_quantity;
                }
            });
            
        });
    });
    
});
