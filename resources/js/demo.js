entry = `<div class="col-12 d-flex justify-content-center shadow p-3 mb-3 bg-white rounded">
                                <div class="col-12 col-md-12">
                                    <div class="d-flex flex-column comment-section" id="myGroup">
                                        <div class="bg-light bg-gradient p-2">
                                            <div class="d-flex flex-row user-info">
                                                <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                                <div class="d-flex flex-column justify-content-start ml-2">
                                                    <span class="d-block font-weight-bold name text-primary">${ item['user']['name'] }</span>
                                                    <span class="date text-black-50">${ item['created_at'] }</span>
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
                                                        entry = entry +
                                                        `<div class="d-flex flex-row user-info">
                                                            <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg">
                                                            <div class="d-flex flex-column justify-content-start ml-2">
                                                                <span class="d-block font-weight-bold name text-primary">${ reply['user']['name'] }</span>
                                                                <span class="date text-black-50">${ reply['created_at'] }</span>
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