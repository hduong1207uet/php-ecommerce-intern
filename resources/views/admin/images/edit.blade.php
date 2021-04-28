@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 admin-content">
        <h1>{{ __('edit_image') }}</h1>
    <div>
    <!--Display errors-->
        @include('messages.error')
    <!--Edit image form-->
    <form method="post" action="{{ route('images.update', $image->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="asset_uri">{{ __('file_path') }}:</label>
            <input type="file" class="form-control" name="asset_uri_group" required/>
        </div>

        <div class="form-group">
            <input type="hidden" name="product_id" value="{{ $image->product_id }}">
        </div>

        <div class="form-group">
            <label for="description">{{ __('description') }}:</label>
            <input type="text" class="form-control" value="{{ $image->description }}" name="description"/>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('edit_image') }}</button>  
        <button type="button"  class="btn_go_back btn btn-danger" >{{ __('go_back') }}</button>   
    </form>
</div>
@endsection
