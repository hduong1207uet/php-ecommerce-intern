@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 mt-3">
         @include('messages.alert')  
    </div>
    <div class="col-sm-12 admin-content"> 
        <h1>{{ __('products') }}</h1>
        <a href="{{ route('products.create') }}"><button type="button" class="btn-add btn btn-success">{{ __('add_new_product') }}</button></a>
        <!--Table of Products-->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="font-weight-bold">
                    <td>{{ __('serial') }}</td>
                    <td>{{ __('product_name') }}</td>
                    <td>{{ __('price') }}</td>
                    <td>{{ __('category') }}</td>
                    <td>{{ __('supplier') }}</td>
                    <td>{{ __('avg_rate') }}</td>
                    <td>{{ __('description') }}</td>
                    <td colspan="3" align="center" class="th-15">{{ __('action') }}</td>
                <tr>
            <thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} $</td>
                    <td>{{ $product->category->type }}</td>
                    <td>{{ $product->supplier }}</td>
                    <td>{{ $product->avg_rate }} <i class="fas fa-star text-success"></i></td>
                    <td>                        
                        <p class="more">{!! $product->description !!}</p>
                        <p class="show-more-msg show-more">{{ __('show_more') }}</p>
                        <p class="show-more-msg show-less">{{ __('show_less') }}</p>
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                    </td>
                    <td>
                        <form id="delete_product_{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-id="{{ $product->id }}" data-delete_msg="{{ __('delete_msg') }}" class="btn_delete_product btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('products.view_details', $product->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 

        <!-- Pagination -->
        {{ $products->links() }}
    </div>
</div>
@endsection
