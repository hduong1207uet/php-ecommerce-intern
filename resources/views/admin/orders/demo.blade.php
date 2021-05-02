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
                    <td colspan="3" align="center" style="width:25%">{{ __('action') }}</td>

                <tr>
            <thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        <button class="btn btn-warning">
                            {{ __('pending') }}
                        </button>
                    </td>
                    <td>{{ $order->ordered_date }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->description }}</td>
                    <td>
                        <form id="approve_order_{{ $order->id }}" action="{{ route('orders.approve', $order->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="button" data-id="{{ $order->id }}" data-delete_msg="{{ __('approve_msg') }}" class="btn_approve_order btn btn-primary btn-sm"><i class="fas fa-check"></i></button>
                        </form>
                    </td>
                    <td>
                        <form id="deny_order_{{ $order->id }}" action="{{ route('orders.deny', $order->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" data-id="{{ $order->id }}" data-delete_msg="{{ __('deny_msg') }}" class="btn_deny_order btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
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