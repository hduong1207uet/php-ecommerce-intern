<div class="row" id="#comment_row_demo">
    <!--Add comment form-->
    <form id="new_comment_form" method="post">
        @csrf        
        <div class="form-group">
            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
        </div>

        <div class="form-group">
            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
        </div>

        <div class="form-group">
            <label for="content">{{ __('content') }}:</label>
            <textarea rows="4" cols="200" class="form-control" name="content" id="new_comment_content"></textarea>
        </div>

        <button type="button" class="btn btn-warning btn_add_comment" data-url="{{ route('clients.store_comment') }}">{{ __('add_new_comment') }}</button>    
    </form>
</div>

<!-- Nested child comments -->
<div class="row mt-3 mb-3" id="comment_row">
     
</div>
