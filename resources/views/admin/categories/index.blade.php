@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 mt-3">
         @include('messages.alert')  
    </div>
    <div class="col-sm-12 admin-content"> 
        <h1>{{ __("categories") }}</h1>
        <a href="{{ route('categories.create') }}"><button type="button" class="btn-add btn btn-success">{{ __("add_new_categories") }}</button></a>
        <!--Table of Categories-->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bold_column">
                    <td>{{ __("serial") }}</td>
                    <td>{{ __("type") }}</td>
                    <td>{{ __("description") }}</td>
                    <td colspan="3" align="center">{{ __("action") }}</td>
                <tr>
            <thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->type }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">{{ __("edit") }}
                    </td>
                    <td>
                        <form id="delete_category_{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-id="{{ $category->id }}" data-delete_msg="{{ __('delete_msg') }}" class="btn_delete_category btn btn-danger btn-sm">{{ __("delete") }}</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-sm">{{ __("view_all_products") }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
</div>
@endsection
