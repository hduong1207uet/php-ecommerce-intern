require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function () {

    load_comments();

    function load_comments () {
        var product_id = $('#product_id').val();
        var token = $('input[name="_token"]').val();
        $.ajax({
            url: 'http://127.0.0.1:8888/products/load-comments',
            method: 'post',
            data: {
                product_id : product_id,
                _token: token,            
            },

            success: function(data){
                data.forEach(function (item) {
                    if(item['parent_comment_id'] == null) {
                        let date = item['created_at'].substring(0, 10);
                        let time = item['created_at'].substring(11, 19);

                        entry = `<div class="col-12 d-flex justify-content-center shadow p-3 mb-3 bg-white rounded">
                                    <div class="col-12 col-md-12">
                                        <div class="d-flex flex-column comment-section" id="myGroup">
                                            <div class="bg-light bg-gradient p-2">
                                                <div class="d-flex flex-row user-info">
                                                    <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                                    <div class="d-flex flex-column justify-content-start ml-2">
                                                        <span class="d-block font-weight-bold name text-primary">${ item['user']['name'] }</span>
                                                        <span class="date text-black-50">${ date + ' ' + time }</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text">${ item['content'] }</p>
                                                </div>
                                            </div>
                    
                                            <div class="bg-white p-1">
                                                <div class="d-flex flex-row fs-12">
                                                    <!-- Like button -->
                                                    <div class="like p-2 cursor">
                                                        <i class="far fa-thumbs-up text-primary"></i>
                                                        <span class="ml-1">like</span>
                                                    </div>
                                                    <!-- Reply button -->
                                                    <div class="p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-${ item['id'] }" href="#collapse-${ item['id'] }">
                                                        <i class="far fa-comments text-primary"></i>
                                                        <span class="ml-1">reply</span>
                                                    </div>
                                                    <!-- Show child comments button -->
                                                    <div class="p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-show-child-${ item['id'] }" href="#collapse-show-child-${ item['id'] }">
                                                        <i class="fas fa-chevron-circle-down text-primary"></i>
                                                        <span class="ml-1">show child comment</span>
                                                    </div>                                
                                                </div>
                                            </div>
                    
                                            <div id="collapse-${ item['id'] }" class="bg-light p-2 collapse" data-parent="#myGroup">
                                                <form id="reply_comment_${ item['id'] }">
                                                    <input type="hidden" name="product_id" value="${ item['product_id'] }">
                                                    <input type="hidden" name="parent_comment_id" value="${ item['id'] }">
                        
                                                    <div class="d-flex flex-row align-items-start">
                                                        <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg">                                
                                                        <textarea class="form-control ml-1 shadow-none textarea" id="new_reply_comment_${ item['id'] }" name="content" required></textarea>
                                                    </div>
                        
                                                    <div class="mt-2 text-right">
                                                        <button class="btn_submit_reply btn btn-primary btn-sm shadow-none" data-id="${ item['id'] }" type="button">Post comment</button>
                                                    </div>
                                                </form>     
                                            </div>
                    
                                            <div id="collapse-show-child-${ item['id'] }" class="bg-light p-2 collapse child-comment" data-parent="#myGroup">`;
                                                        item['replies'].forEach(function (reply) {
                                                            let date = reply['created_at'].substring(0, 10);
                                                            let time = reply['created_at'].substring(11, 19);

                                                            entry = entry +
                                                            `<div class="d-flex flex-row user-info">
                                                                <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg">
                                                                <div class="d-flex flex-column justify-content-start ml-2">
                                                                    <span class="d-block font-weight-bold name text-primary">${ reply['user']['name'] }</span>
                                                                    <span class="date text-black-50">${ date + ' ' + time }</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2">
                                                                <p class="comment-text">${ reply['content'] }</p>
                                                            </div>`;                              
                                                        });                                    
                                                entry = entry + 
                                            `</div>
                                        </div>
                                    </div> 
                                </div>`;
                                                                        
                        $("#comment_row").prepend(entry);
                    }
                });
            }
        });
    }

    //Prepend comment
    function prepend_comments(item) {  
        let date = item['created_at'].substring(0, 10);
        let time = item['created_at'].substring(11, 19);      
        entry = `<div class="col-12 d-flex justify-content-center shadow p-3 mb-3 bg-white rounded">
            <div class="col-12 col-md-12">
                <div class="d-flex flex-column comment-section" id="myGroup">
                    <div class="bg-light bg-gradient p-2">
                        <div class="d-flex flex-row user-info">
                            <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                            <div class="d-flex flex-column justify-content-start ml-2">
                                <span class="d-block font-weight-bold name text-primary">${ item['user']['name'] }</span>
                                <span class="date text-black-50">${ date + ' ' + time }</span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="comment-text">${ item['content'] }</p>
                        </div>
                    </div>

                    <div class="bg-white p-1">
                        <div class="d-flex flex-row fs-12">
                            <!-- Like button -->
                            <div class="like p-2 cursor">
                                <i class="far fa-thumbs-up text-primary"></i>
                                <span class="ml-1">like</span>
                            </div>
                            <!-- Reply button -->
                            <div class="p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-${ item['id'] }" href="#collapse-${ item['id'] }">
                                <i class="far fa-comments text-primary"></i>
                                <span class="ml-1">reply</span>
                            </div>
                            <!-- Show child comments button -->
                            <div class="p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-show-child-${ item['id'] }" href="#collapse-show-child-${ item['id'] }">
                                <i class="fas fa-chevron-circle-down text-primary"></i>
                                <span class="ml-1">show child comment</span>
                            </div>                                
                        </div>
                    </div>

                    <div id="collapse-${ item['id'] }" class="bg-light p-2 collapse" data-parent="#myGroup">
                        <form id="reply_comment_${ item['id'] }">
                            <input type="hidden" name="parent_comment_id" class="parent_comment_id" value="${ item['id'] }">

                            <div class="d-flex flex-row align-items-start">
                                <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg">                                
                                <textarea class="form-control ml-1 shadow-none textarea" id="new_reply_comment_${ item['id'] }" name="content" required></textarea>
                            </div>

                            <div class="mt-2 text-right">
                                <button class="btn_submit_reply btn btn-primary btn-sm shadow-none" data-id="${ item['id'] }" type="button">Post comment</button>
                            </div>
                        </form>    
                    </div>

                    <div id="collapse-show-child-${ item['id'] }" class="bg-light p-2 collapse child-comment" data-parent="#myGroup">`;                                                               
                        entry = entry + 
                    `</div>
                </div>
            </div> 
        </div>`;
                                                
        $("#comment_row").prepend(entry);            
               
    }

    //Prepend child comment
    function prepend_reply_comments(data) {
        let date = data['created_at'].substring(0, 10);
        let time = data['created_at'].substring(11, 19);
                               
        let entry = `<div class="d-flex flex-row user-info">
                        <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg">
                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name text-primary">${ data['user']['name'] }</span>
                            <span class="date text-black-50">${ date + ' ' + time }</span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">${ data['content'] }</p>
                    </div>`;  
        $("#collapse-show-child-" + data['parent_comment_id']).prepend(entry);
    }

    //Add new comment
    $('.btn_add_comment').click(function (e) {
        e.preventDefault();
        let ele = $(this);
        let content = $("#new_comment_content").val();
        let user_id = $('#user_id').val();
        let product_id = $('#product_id').val();
        let token = $('input[name="_token"]').val();
        
        $.ajax({
            url: ele.attr('data-url'),
            method : 'post',            
            data : {
            _token : token,
            product_id : product_id,
            user_id : user_id,
            content : content,
            },

            success: function(data) { 
                prepend_comments(data);
                $("#new_comment_form")[0].reset();                
            }
        });
    });

    $('#comment_row').on("click", ".btn_submit_reply", function (e) {
        let parent_comment_id = $(this).attr("data-id");
        let content = $("#new_reply_comment_" + parent_comment_id).val();        
        let user_id = $('#user_id').val();
        let product_id = $('#product_id').val();
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: 'http://127.0.0.1:8888/comments/store-reply',
            method : 'post',            
            data : {
            _token : token,
            product_id : product_id,
            user_id : user_id,
            content : content,
            parent_comment_id : parent_comment_id,
            },

            success: function(data) { 
                prepend_reply_comments(data);
                $("#reply_comment_" + data['parent_comment_id'])[0].reset();                
            }
        });
    });

       
});