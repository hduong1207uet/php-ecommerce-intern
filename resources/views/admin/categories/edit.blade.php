@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 admin-content">
        <h1>{{ __("edit_category") }}</h1>
    <div>
    <!--Display errors-->
    @include('messages.error')
    <!--Edit post form-->
    <form method="post" action="{{ route('categories.update', $category->id) }}">
        @method('PATCH') 
        @csrf
        <div class="form-group">    
            <label for="type">{{ __("type") }}:</label>
            <input type="text" class="form-control" name="type" value="{{ $category->type }}" required/>
        </div>

        <div class="form-group">
            <label for="description">{{ __("description") }}:</label>
            <input type="text" class="form-control" name="description" value="{{ $category->description }}" required/>
        </div>
        
        <button type="submit" class="btn btn-primary">{{ __("edit_category") }}</button>  
        <button type="button"  class="btn_go_back btn btn-danger" >{{ __("go_back") }}</button>   
    </form>
</div>
@endsection
