require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function () {
    let domain = window.location.hostname ;
    let port = window.location.port;
    let fullDomain = `${ domain }:${ port }`;
    
    load_orders();
    function load_orders () {
        let token = $('input[name="_token"]').val();
        let pending_status = 0;
        let approved_status = 1;
        let denied_status = 2;
        let pending_msg = 'pending';
        let approved_msg = 'approved';
        let denied_msg = 'denied';

        $.ajax({
            url: `http://${ fullDomain }/orders/load-orders`,
            method : 'post',
            data: {
                _token : token,
            },

            success: function (data){
                data.forEach(function (item) {
                    if (item['status'] == pending_status) {
                        $("#body_pending").prepend(
                            `<tr id="order_${ item['id'] }">
                                <td>${ item['id'] }</td>
                                <td>${ item['user']['name'] }</td>
                                <td><button class="btn btn-warning btn-sm">${ pending_msg }</button></td>    
                                <td>${ item['ordered_date'] }</td>
                                <td>${ item['address'] }</td>
                                <td>${ item['phone_number'] }</td>
                                <td>${ (item['description']) ? item['description'] : '' }</td>
                                <td>
                                    <form id="approve_order_${ item['id'] }" method="post">
                                        <button type="button" data-id="${ item['id'] }" class="btn_approve_order btn btn-primary btn-sm"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form id="deny_order_${ item['id'] }" method="post">
                                        <button type="button" data-id="${ item['id'] }" class="btn_deny_order btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a href="http://${ fullDomain }/orders/${ item['id'] }/view-details" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                                </td>
                            <tr>`
                        );
                    }//end if

                    //Load approved orders
                    if (item['status'] == approved_status) {
                        $("#body_approved").prepend(
                            `<tr id="order_${ item['id'] }">
                                <td>${ item['id'] }</td>
                                <td>${ item['user']['name'] }</td>
                                <td><button class="btn btn-success btn-sm">${ approved_msg }</button></td>    
                                <td>${ item['ordered_date'] }</td>
                                <td>${ item['address'] }</td>
                                <td>${ item['phone_number'] }</td>
                                <td>${ (item['description']) ? item['description'] : '' }</td>                                
                                <td>
                                    <a href="http://${ fullDomain }/orders/${ item['id'] }/view-details" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                                </td>
                            <tr>`
                        );
                    }//end if

                    //Load denied orders
                    if (item['status'] == denied_status) {
                        $("#body_denied").prepend(
                            `<tr id="order_${ item['id'] }">
                                <td>${ item['id'] }</td>
                                <td>${ item['user']['name'] }</td>
                                <td><button class="btn btn-danger btn-sm">${ denied_msg }</button></td>    
                                <td>${ item['ordered_date'] }</td>
                                <td>${ item['address'] }</td>
                                <td>${ item['phone_number'] }</td>
                                <td>${ (item['description']) ? item['description'] : '' }</td>                                
                                <td>
                                    <a href="http://${ fullDomain }/orders/${ item['id'] }/view-details" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                                </td>
                            <tr>`
                        );
                    }//end if

                });//end for each
            }
        });
    }//end load orders

    //Approve order
    $("#nav-pending").on('click', '.btn_approve_order' ,function () {
        let orderId = $(this).attr('data-id');
        let token = $('input[name="_token"]').val();
        let approved_msg = 'approved';

        $.ajax({
            url: `http://${ fullDomain }/orders/approve`,
            method: 'post',
            data: {
                _token: token,
                orderId: orderId,
            },

            success: function(data) {
                $("#order_" + orderId).remove();
                $("#body_approved").prepend(
                    `<tr id="order_${ data['id'] }">
                        <td>${ data['id'] }</td>
                        <td>${ data['user']['name'] }</td>
                        <td><button class="btn btn-success btn-sm">${ approved_msg }</button></td>    
                        <td>${ data['ordered_date'] }</td>
                        <td>${ data['address'] }</td>
                        <td>${ data['phone_number'] }</td>
                        <td>${ (data['description']) ? data['description'] : '' }</td>                                
                        <td>
                            <a href="http://${ fullDomain }/orders/${ data['id'] }/view-details" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                        </td>
                    <tr>`
                );
            }
        });
    });

    //Deny order
    $("#nav-pending").on('click', '.btn_deny_order' ,function () {
        let orderId = $(this).attr('data-id');
        let token = $('input[name="_token"]').val();            
        let denied_msg = 'denied';

        $.ajax({
            url: `http://${ fullDomain }/orders/deny`,
            method: 'post',
            data: {
                _token: token,
                orderId: orderId,
            },

            success: function(data) {
                $("#order_" + orderId).remove();
                //Load denied orders
                $("#body_denied").prepend(
                    `<tr id="order_${ data['id'] }">
                        <td>${ data['id'] }</td>
                        <td>${ data['user']['name'] }</td>
                        <td><button class="btn btn-danger btn-sm">${ denied_msg }</button></td>    
                        <td>${ data['ordered_date'] }</td>
                        <td>${ data['address'] }</td>
                        <td>${ data['phone_number'] }</td>
                        <td>${ (data['description']) ? data['description'] : '' }</td>                                
                        <td>
                            <a href="http://${ fullDomain }/orders/${ data['id'] }/view-details" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                        </td>
                    <tr>`
                );
            }
        });
    });
    
});
