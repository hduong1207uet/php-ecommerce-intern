@extends('admin.app')

@section('admin-content')
<div class="row mt-3 ml-3 mb-3"> 
    <h3>{{ __('orders') }}</h3>
</div>

<div class="row">
    <div class="col-12">
         <a href="{{ route('test') }}"> Click me </a>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">{{ __('pending') }}</a>
                <a class="nav-item nav-link" id="nav-approve-tab" data-toggle="tab" href="#nav-approve" role="tab" aria-controls="nav-approve" aria-selected="false">{{ __('approved') }}</a>
                <a class="nav-item nav-link" id="nav-deny-tab" data-toggle="tab" href="#nav-deny" role="tab" aria-controls="nav-deny" aria-selected="false">{{ __('denied') }}</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                <!--Table of orders-->
                <form>
                    @csrf
                    <table class="table table-striped table-bordered mt-4">
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
                        <tbody id="body_pending">
                        
                        </tbody>
                    </table>
                <form>
            </div>
            <div class="tab-pane fade" id="nav-approve" role="tabpanel" aria-labelledby="nav-approve-tab">
                <!--Table of orders-->
                <form>
                    @csrf
                    <table class="table table-striped table-bordered mt-4">
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
                        <tbody id="body_approved">
                        
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-deny" role="tabpanel" aria-labelledby="nav-deny-tab">
                <!--Table of orders-->
                <form>
                    @csrf
                    <table class="table table-striped table-bordered mt-4">
                        <thead>
                            <tr class="font-weight-bold">
                                <td>{{ __('serial') }}</td>
                                <td>{{ __('user_name') }}</td>
                                <td>{{ __('status') }}</td>
                                <td>{{ __('order_date') }}</td>
                                <td>{{ __('address') }}</td>
                                <td>{{ __('phone_number') }}</td>
                                <td>{{ __('description') }}</td>
                                <td align="center" class="th-15">{{ __('action') }}</td>
                            <tr>
                        <thead>
                        <tbody id="body_denied">
                        
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/orders.js') }}" defer></script>
@endsection
