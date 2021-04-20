@extends('layouts.app')

@section('content')
    <!-- Menu -->
    <div class="row top-menu">
        <div class="container pl-0 pr-0">
        <!-- Menu -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <ul class="nav navbar-nav my-menu text-uppercase">
                        <li>{{ __('home') }}</li>
                        <li>{{ __('acoustic_guitar') }}</li>
                        <li>{{ __('classic_guitar') }}</li>
                        <li>{{ __('electric_guitar') }}</li>
                    </ul>
                    <!-- Search box -->
                    <form class="navbar-form" action ="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="{{ __('search') }}" name="search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fab fa-searchengin fa-lg"></i>
                                </button>    
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>    
    @yield('home-content')

    @section('footer')    
        <div class="row mb-5">
            <div class="container-fluid my-footer margined-row ">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <b>{{ __('guitarshop_inf') }}</b><br>
                            <a href="#">{{ __('about_us') }}</a><br>
                            <a href="#">{{ __('showroms_agency') }}</a><br>
                            <a href="#">{{ __('contact_us') }}</a><br>
                            <a href="#">{{ __('installment_purchase') }}</a><br>
                            <a href="#">{{ __('website_terms_of_use') }}</a><br>
                            <a href="#">{{ __('recruitment') }}</a><br>
                        </div>
                        <div class="col-3">
                            <b>{{ __('general_guide') }}</b><br>
                            <a href="#">{{ __('delivery_and_return_product') }}</a><br>
                            <a href="#">{{ __('purchase_guide') }}</a><br>
                            <a href="#">{{ __('payment_and_security') }}</a><br>
                            <a href="#">{{ __('warranty_policy') }}</a><br>
                            <a href="#">{{ __('activate_waranty') }}</a><br>
                        </div>
                        <div class="col-4">
                            <b>{{ __('customer_support') }}</b><br>
                            {{ __('hotline') }} : <a href="#">{{ config('app.hotline') }}</a><br>
                            {{ __('complaints_and_warranty') }} : <a href="#">{{ config('app.warranty_phone_number') }}</a><br>
                            {{ __('timeserver') }} : <a href="#">{{ config('app.timeserver') }}</a><br>
                            Email: <a href="#">{{ config('app.email') }}</a><br>
                        </div>
                        <div class="col-2">
                            <b>{{ __('social_pages') }}</b>
                        </div>                    
                    </div>
                    <div class="row margined-row">
                        <div class="col-6">
                            <b>{{ __('footer_name') }}</b><br>
                            {{ __('address') }} : {{ config('app.address_detail') }}<br>
                            {{ __('phone_number') }} : <a href="#">{{ config('app.phone_number') }}</a><br>                            
                            Email: <a href="#">{{ config('app.email') }}</a>
                        </div>
                        <div class="col-6">
                            <b>{{ __('payment_method') }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @show
@endsection
