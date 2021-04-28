<div class="row">
    <div class="col-sm-12 mt-3">
         @include('messages.alert')  
    </div>
    <div class="col-sm-12 admin-content">         
        <a href="{{ route('products.add_images', $product->id) }}"><button type="button" class="btn-add btn btn-success">{{ __('add_new_images') }}</button></a>
        <button type="button" class="btn_go_back btn btn-danger" >{{ __('go_back') }}</button> 
        <!--Table of Products-->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="font-weight-bold">
                    <td>{{ __('serial') }}</td>
                    <td>{{ __('image_content') }}</td>                    
                    <td class="th-50">{{ __('description') }}</td>
                    <td colspan="2">{{ __('action') }}</td>
                <tr>
            <thead>
            <tbody>
                @foreach ($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img class="product-img" src="{{ asset('/images_assets/products/' . $image->asset_uri) }}" class="img-thumbnail" alt="{{ __('product_image') }}"></td>                    
                    <td>{{ $image->description }}</td>
                    <td>
                        <a href="{{ route('images.edit', $image->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <form id="delete_image_{{ $image->id }}" action="{{ route('images.destroy', $image->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-id="{{ $image->id }}" data-delete_msg="{{ __('delete_msg') }}" class="btn_delete_image btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $images->links() }}
    </div>
</div>
