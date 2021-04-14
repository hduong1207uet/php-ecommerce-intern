@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 admin-content">
        <h1>{{ __('add_new_images') }}</h1>
    <div>
    <!--Display errors-->
    @include('messages.error')
    <!--Edit post form-->
    <form method="post" action="{{ route('images.store') }}">
        @csrf
        <div class="form-group">
            <label for="asset_uri_group">{{ __('file_path') }}:</label>
            <input type="file" class="form-control" name="asset_uri_group[]" accept=".jpg,.png,.jpeg,.gif" required multiple/>
        </div>

        <div class="form-group">
            <label for="product_id">{{ __('product_name') }}:</label>
            <select class="group_select" name="product_id">
                @foreach ($productIds as $productId)
                    <option value="{{ $productId->id }}"> {{ $productId->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">{{ __('description') }}:</label>
            <input type="text" class="form-control" name="description"/>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('add_new_images') }}</button>  
        <button type="button" class="btn_go_back btn btn-danger" >{{ __('go_back') }}</button>   
    </form>
</div>
@endsection
