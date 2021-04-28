@extends('admin.app')

@section('admin-content')
<div class="row">
    <div class="col-sm-12 admin-content">
        <h1>{{ __('edit_order_detail') }}</h1>
    <div>
    <!--Display errors-->
    @include('messages.error')

    <!--Edit order detail form-->
    <form method="post" action="{{ route('order-details.update', $order_detail->id) }}">
        @csrf
        @method('PATCH')
        <input type="hidden" class="form-control" name="order_id" value="{{ $order_detail->order_id }}" required/>                            
        <div class="form-group">
            <label for="products">{{ __('products') }}:</label>
            <select class="group_select" name="product_id">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"> {{ $product->name }} </option>
                @endforeach
            </select>
        </div>             

        <div class="form-group">
            <label for="quantities">{{ __('quantities') }}:</label>
            <input type="number" class="form-control" name="quantities" value="{{ $order_detail->quantities }}" required/>
        </div>

        <div class="form-group">
            <label for="required_date">{{ __('required_date') }}:</label>
            <input type="datetime-local" class="form-control" name="required_date" value="{{ substr($order_detail->required_date, 0, 10).'T'.substr($order_detail->required_date, 11) }}" required/>
        </div>

        <div class="form-group">
            <label for="shipped_date">{{ __('shipped_date') }}:</label>
            <input type="datetime-local" class="form-control" name="shipped_date" value="{{ substr($order_detail->shipped_date, 0, 10).'T'.substr($order_detail->shipped_date, 11) }}" required/>
        </div>

        <div class="form-group">
            <label for="status">{{ __('status') }}:</label>
            <select class="group_select" name="status">                
                    <option value="0"> {{ __('not_shipped_yet') }} </option>
                    <option value="1"> {{ __('shipped') }} </option>                
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('edit_order_detail') }}</button>  
        <button type="button" class="btn_go_back btn btn-danger" >{{ __('go_back') }}</button>   
    </form>
</div>
@endsection
