@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 mt-3">
        @include('messages.alert')
        @include('messages.error')  
    </div>
    <div class="col-sm-12 admin-content"> 
        <h1>{{ __('orders') }}</h1>
        <a href="{{ route('orders.create') }}"><button type="button" class="btn-add btn btn-success">{{ __('add_new_order') }}</button></a>
        <!--Table of Products-->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="font-weight-bold">
                    <td>{{ __('serial') }}</td>
                    <td>{{ __('user_name') }}</td>
                    <td>{{ __('status') }}</td>
                    <td>{{ __('order_date') }}</td>
                    <td>{{ __('address') }}</td>
                    <td>{{ __('phone_number') }}</td>
                    <td>{{ __('description') }}</td>
                    <td colspan="3" align="center" class="th-15">{{ __('action') }}</td>
                <tr>
            <thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ ($order->status == 0) ? __('not_shipped_yet') : __('shipped') }}</td>
                    <td>{{ $order->ordered_date }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->description }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                    </td>
                    <td>
                        <form id="delete_order_{{ $order->id }}" action="{{ route('orders.destroy', $order->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-id="{{ $order->id }}" data-delete_msg="{{ __('delete_msg') }}" class="btn_delete_order btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('orders.view_details', $order->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 

        <!-- Pagination -->
        {{ $orders->links() }}
    </div>
</div>
@endsection
