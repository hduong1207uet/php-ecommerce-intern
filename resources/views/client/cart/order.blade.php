@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-3">
            @include('messages.alert')  
        </div>
    </div>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th class="th-50">{{ __('product') }}</th>
                <th class="th-15">{{ __('quantity') }}</th>
                <th class="th-15 text-center">{{ __('subtotal') }}</th>
                <th class="th-15"></th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0; 
            @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php
                        $total += $details['price'] * $details['quantity'];
                    @endphp
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img class="img-thumbnail" src="{{ asset('images_assets/products/' . $details['featured_img']) }}" width="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h5 class="nomargin">{{ $details['name'] }}</h5>
                                </div>
                            </div>
                        </td>                        
                        <td data-th="quantity">
                            <input type="text" name="quantity" value="{{ $details['quantity'] }}" class="form-control quantity" readonly/>
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>                        
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
            <form id="order_form" action="{{ route('order') }}" method="post">
                @csrf
                <tr>
                    <td><b>{{ __('address') }}</b>: <input class="w-100 form-control" id="address_input" type="text" name="txt_address" placeholder="{{ __('enter_your_address') }}"></td>            
                </tr>
                <tr>
                    <td><b>{{ __('note_for_seller') }}</b> : <textarea class="w-100 form-control" type="text-area" name="txt_note" placeholder="{{ __('enter_note_for_seller') }}"></textarea></td>
                </tr>
            </form>    
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>{{ __('total') }} {{ $total }} $</strong></td>
            </tr>
            <tr>
                <td><button class="btn btn_go_back btn-danger btn-lg"><i class="fa fa-angle-left"></i> {{ __('go_back') }}</button></td>         
                <td>                                        
                    <button id="btn_order" class="btn btn-primary btn-lg">{{ __('order') }} <i class="fa fa-angle-right"></i></button>
                </td>
            </tr>
        </tfoot>
    </table>
<div>
@endsection
