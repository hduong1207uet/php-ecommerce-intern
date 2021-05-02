@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 mt-3">
        @include('messages.alert')
        @include('messages.error')  
    </div>
    <div class="col-sm-12 admin-content"> 
        <h1>{{ __('order_detail') }}</h1>
        <button type="button" class="btn_go_back btn btn-danger mb-3" >{{ __('go_back') }}</button>
        <!--Table of Products-->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="font-weight-bold">
                    <td>{{ __('serial') }}</td>
                    <td>{{ __('order_id') }}</td>
                    <td>{{ __('product_name') }}</td>
                    <td>{{ __('quantity') }}</td>
                    <td>{{ __('shipped_date') }}</td>
                    <td>{{ __('status') }}</td>
                    <td>{{ __('total') }}</td>
                <tr>
            <thead>
            <tbody>
                @foreach($order_details as $order_detail)
                <tr>
                    <td>{{ $order_detail->id }}</td>
                    <td>{{ $order_detail->order_id }}</td>
                    <td>{{ $order_detail->product->name }}</td>
                    <td>{{ $order_detail->quantities }}</td>
                    <td>{{ $order_detail->shipped_date }}</td>
                    <td>{{ ($order_detail->status == 0) ? __('not_shipped_yet') : __('shipped') }}</td> 
                    <td> {{ $order_detail->product->price * $order_detail->quantities }} $</td>                 
                </tr>
                @endforeach
            </tbody>
        </table> 

        <!-- Pagination -->
        {{ $order_details->links() }}
    </div>
</div>
@endsection
