@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 mt-3">
        @include('messages.alert')
        @include('messages.error')  
    </div>
    <div class="col-sm-12 admin-content"> 
        <h1>{{ __('order_detail') }}</h1>
        <a href="{{ route('orders.create_detail', $order->id) }}"><button type="button" class="btn-add btn btn-success">{{ __('add_new_order_detail') }}</button></a>
        <!--Table of Products-->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="font-weight-bold">
                    <td>{{ __('serial') }}</td>
                    <td>{{ __('order_id') }}</td>
                    <td>{{ __('product_name') }}</td>
                    <td>{{ __('quantity') }}</td>
                    <td>{{ __('required_date') }}</td>
                    <td>{{ __('shipped_date') }}</td>
                    <td>{{ __('status') }}</td>
                    <td colspan="3" align="center" class="th-15">{{ __('action') }}</td>
                <tr>
            <thead>
            <tbody>
                @foreach($order_details as $order_detail)
                <tr>
                    <td>{{ $order_detail->id }}</td>
                    <td>{{ $order_detail->order_id }}</td>
                    <td>{{ $order_detail->product->name }}</td>
                    <td>{{ $order_detail->quantities }}</td>
                    <td>{{ $order_detail->required_date }}</td>
                    <td>{{ $order_detail->shipped_date }}</td>
                    <td>{{ ($order_detail->status == 0) ? __('not_shipped_yet') : __('shipped') }}</td>
                    <td>
                        <a href="{{ route('order-details.edit', $order_detail->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                    </td>
                    <td>
                        <form id="delete_order_detail_{{ $order_detail->id }}" action="{{ route('order-details.destroy', $order_detail->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-id="{{ $order_detail->id }}" data-delete_msg="{{ __('delete_msg') }}" class="btn_delete_order_detail btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table> 

        <!-- Pagination -->
        {{ $order_details->links() }}
    </div>
</div>
@endsection
