@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 admin-content">
        <h1>{{ __('edit_comment') }}</h1>
    <div>
    <!--Display errors-->
    @include('messages.error')

    <!--Edit comment form-->
    <form method="post" action="{{ route('comments.update', $comment->id) }}">
        @csrf
        @method('PATCH')    
        <div class="form-group">
            <input type="hidden" name="product_id" value="{{ $comment->product_id }}">
        </div>

        <div class="form-group">
            <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
        </div>
                
        <div class="form-group">
            <label for="content">{{ __('content') }}:</label>
            <textarea rows="8" class="form-control" name="content">{{ $comment->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('edit_comment') }}</button>  
        <button type="button" class="btn_go_back btn btn-danger" >{{ __('go_back') }}</button>   
    </form>
</div>
@endsection
