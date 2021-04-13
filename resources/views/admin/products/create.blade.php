@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 admin-content">
        <h1>{{ __('add_new_product') }}</h1>
    <div>
    <!--Display errors-->
    @include('messages.error')
    <!--Edit post form-->
    <form method="post" action="{{ route('products.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('name') }}:</label>
            <input type="text" class="form-control" name="name" required/>
        </div>

        <div class="form-group">
            <label for="price">{{ __('price') }}:</label>
            <input type="number" class="form-control" name="price" step=any required/>
        </div>

        <div class="form-group">
            <label for="suppiler">{{ __('supplier') }}:</label>
            <input type="text" class="form-control" name="supplier" required/>
        </div>

        <div class="form-group">
            <label for="category">{{ __('category') }}:</label>
            <select class="group_select" name="category_id">
                @foreach ($categoryIds as $categoryId)
                    <option value="{{ $categoryId->id }}"> {{ $categoryId->type }} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">{{ __('description') }}:</label>
            <input type="text" class="form-control" name="description" required/>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('add_new_product') }}</button>  
        <button type="button"  class="btn_go_back btn btn-danger" >{{ __('go_back') }}</button>   
    </form>
</div>
@endsection
