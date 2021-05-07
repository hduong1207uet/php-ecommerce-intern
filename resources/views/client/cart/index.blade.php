@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-3">
            @include('messages.alert')
            @include('messages.error')
        </div>        
    </div>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th class="th-50">{{ __('product') }}</th>
                <th class="th-10">{{ __('price') }}</th>
                <th class="th-15">{{ __('quantity') }}</th>
                <th class="th-15 text-center">{{ __('subtotal') }}</th>
                <th class="th-5"></th>
                <th class="th-5"></th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity'] ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img class="img-thumbnail" src="{{ asset('images_assets/products/' . $details['featured_img']) }}" width="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h5 class="nomargin">{{ $details['name'] }}</h5>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>
                        <td data-th="quantity">
                            <input type="number" name="quantity" initial-quantity="{{ $details['quantity'] }}" id="cart_quantity_{{ $id }}" data-id="{{ $id }}" value="{{ $details['quantity'] }}" class="cart_quantity form-control quantity" min=1 max="{{ $productQuantity[$id] }}"/>
                            <p>{!! __('in_stock') . ': <b class="text-primary">' . $productQuantity[$id] . '</b>' !!}</p>
                        </td>
                        <td data-th="Subtotal" class="text-center" >
                            $<p id="sub_total_{{ $id }}">{{ $details['price'] * $details['quantity'] }}</p>
                        </td>
                        <td class="actions">                                                
                            <button class="btn btn-info btn-sm btn_update_cart" type="button" data-csrf-token="{{ csrf_token() }}" data-id="{{ $id }}"><i class="fas fa-sync-alt"></i></button>                        
                        </td>
                        <td>   
                            <form id="remove_from_cart_{{ $id }}" action="{{ route('remove_from_cart', $id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn_remove_from_cart" data-id="{{ $id }}" type="button" data-delete_msg="{{ __('delete_msg') }}"><i class="fas fa-trash-alt"></i></button>
                            </form>                        
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>{{ __('total') }} $ <p id="order_total">{{ $total }}</p></strong></td>
            </tr>
            <tr>
                <td><a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> {{ __('continue_shopping') }}</a></td>
                <td colspan="2" class="hidden-xs"></td>            
                <td><a href="{{ route('buy_products') }}" class="btn btn-primary">{{ __('buy_products') }} <i class="fa fa-angle-right"></i></a></td>          
            </tr>
        </tfoot>
    </table>
</div>
<script src="{{ asset('js/client-cart.js') }}" defer></script>    
@endsection
