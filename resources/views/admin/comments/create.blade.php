@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 admin-content">
        <h1>{{ __('add_new_comment') }}</h1>
    <div>
    <!--Display errors-->
    @include('messages.error')

    <!--Add comment form-->
    <form method="post" action="{{ route('comments.store') }}">
        @csrf        
        <div class="form-group">
            <input type="hidden" name="product_id" value="{{ $productId }}">
        </div>

        <div class="form-group">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>

        <div class="form-group">
            <label for="content">{{ __('content') }}:</label>
            <textarea rows="8" class="form-control" name="content"> </textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('add_new_comment') }}</button>  
        <button type="button" class="btn_go_back btn btn-danger" >{{ __('go_back') }}</button>   
    </form>
</div>
@endsection
