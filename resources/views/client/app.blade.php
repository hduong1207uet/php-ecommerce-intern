@extends('layouts.app')

@section('content')
    @yield('home-content')

    @section('footer')    
        <div class="row mb-5">
            <div class="container-fluid my-footer margined-row ">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            {{ __('guitarshop_inf') }}<br>
                            <a href="#">{{ __('about_us') }}</a><br>
                            <a href="#">{{ __('showroms_agency') }}</a><br>
                            <a href="#">{{ __('contact_us') }}</a><br>
                            <a href="#">{{ __('installment_purchase') }}</a><br>
                            <a href="#">{{ __('website_terms_of_use') }}</a><br>
                            <a href="#">{{ __('recruitment') }}</a><br>
                        </div>
                        <div class="col-3">
                            {{ __('general_guide') }}<br>
                            <a href="#">{{ __('delivery_and_return_product') }}</a><br>
                            <a href="#">{{ __('purchase_guide') }}</a><br>
                            <a href="#">{{ __('payment_and_security') }}</a><br>
                            <a href="#">{{ __('warranty_policy') }}</a><br>
                            <a href="#">{{ __('activate_waranty') }}</a><br>
                        </div>
                        <div class="col-4">
                            {{ __('customer_support') }}<br>
                            {{ __('hotline') }} : <a href="#">{{ config('app.hotline') }}</a><br>
                            {{ __('complaints_and_warranty') }} : <a href="#">{{ config('app.warranty_phone_number') }}</a><br>
                            {{ __('timeserver') }} : <a href="#">{{ config('app.timeserver') }}</a><br>
                            Email: <a href="#">{{ config('app.email') }}</a><br>
                        </div>
                        <div class="col-2">
                            {{ __('social_pages') }}
                        </div>                    
                    </div>
                    <div class="row margined-row">
                        <div class="col-6">
                            {{ __('footer_name') }}<br>
                            {{ __('address') }} : {{ config('app.address_detail') }}<br>
                            {{ __('phone_number') }} : <a href="#">{{ config('app.phone_number') }}</a><br>                            
                            Email: <a href="#">{{ config('app.email') }}</a>
                        </div>
                        <div class="col-6">
                            {{ __('payment_method') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @show
@endsection
