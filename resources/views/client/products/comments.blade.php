<div class="row">
    <h3 class="font-weight-bold">{{ __('comments') }}</h3>
    <!--Display errors-->
    @include('messages.error')

    <!--Add comment form-->
    <form method="post" action="{{ route('clients.store_comment') }}">
        @csrf        
        <div class="form-group">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
        </div>

        <div class="form-group">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>

        <div class="form-group">
            <label for="content">{{ __('content') }}:</label>
            <textarea rows="4" cols="200" class="form-control" name="content"> </textarea>
        </div>

        <button type="submit" class="btn btn-warning">{{ __('add_new_comment') }}</button>    
    </form>
</div>

<!-- Nested child comments -->
<div class="row mt-3 mb-3 comment-row">
    @foreach ($comments as $comment)
        @if ($comment->parent_comment_id == null)
            <!-- Parent comments-->
            <div class="col-12 d-flex justify-content-center shadow p-3 mb-3 bg-white rounded">
                <div class="col-12 col-md-12">
                    <div class="d-flex flex-column comment-section" id="myGroup">
                        <div class="bg-light bg-gradient p-2">
                            <div class="d-flex flex-row user-info">
                                <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <div class="d-flex flex-column justify-content-start ml-2">
                                    <span class="d-block font-weight-bold name text-primary">{{ $comment->user->name }}</span>
                                    <span class="date text-black-50">{{ $comment->created_at }}</span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text">{{ $comment->content }}</p>
                            </div>
                        </div>

                        <div class="bg-white p-1">
                            <div class="d-flex flex-row fs-12">
                                <!-- Like button -->
                                <div class="like p-2 cursor">
                                    <i class="far fa-thumbs-up text-primary"></i>
                                    <span class="ml-1">{{ __('like') }}</span>
                                </div>
                                <!-- Reply button -->
                                <div class="p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-{{ $comment->id }}" href="#collapse-{{ $comment->id }}">
                                    <i class="far fa-comments text-primary"></i>
                                    <span class="ml-1">{{ __('reply') }}</span>
                                </div>
                                <!-- Show child comments button -->
                                <div class="p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-show-child-{{ $comment->id }}" href="#collapse-show-child-{{ $comment->id }}">
                                    <i class="fas fa-chevron-circle-down text-primary"></i>
                                    <span class="ml-1">{{ __('show_child_comments') }}</span>
                                </div>                                
                            </div>
                        </div>

                        <!-- Reply form detail collapse -->
                        <div id="collapse-{{ $comment->id }}" class="bg-light p-2 collapse" data-parent="#myGroup">
                            <form id="reply_comment_{{ $comment->id}}" action="{{ route('clients.store_reply') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="parent_comment_id" value="{{ $comment->id}}">

                                <div class="d-flex flex-row align-items-start">
                                    <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg">                                
                                    <textarea class="form-control ml-1 shadow-none textarea" name="content" required></textarea>
                                </div>

                                <div class="mt-2 text-right">
                                    <button class="btn btn-primary btn-sm shadow-none btn_submit_reply" data-id="{{ $comment->id }}" type="button">{{ __('post_comment') }}</button>
                                </div>
                            </form>    
                        </div>

                        <!-- Child comment detail collapse -->
                        <div id="collapse-show-child-{{ $comment->id }}" class="bg-light p-2 collapse child-comment" data-parent="#myGroup">
                            @if ( $comment->replies )
                                @foreach ($comment->replies as $reply)
                                    <div class="d-flex flex-row user-info">
                                        <img class="rounded-circle avatar-comment" src="https://i.imgur.com/RpzrMR2.jpg">
                                        <div class="d-flex flex-column justify-content-start ml-2">
                                            <span class="d-block font-weight-bold name text-primary">{{ $reply->user->name }}</span>
                                            <span class="date text-black-50">{{ $reply->created_at }}</span>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <p class="comment-text">{{ $reply->content }}</p>
                                    </div>                                  
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div> 
            </div>
        @endif
    @endforeach    
</div>
