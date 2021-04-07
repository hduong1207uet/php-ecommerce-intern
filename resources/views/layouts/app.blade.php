<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Boostrap -->    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('register') }}</a>
                                </li>
                            @endif
                        @else 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn-logout"  href="{{ route('logout') }}">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <!--language Div-->
                    <div class="d-flex flex-row-reverse mr-5 mt-3">
                        <a href="{{ route('lang', ['lang' => 'vi']) }}"><button class="btn btn-info btn-sm" id="lang-btn">VI</button></a>
                        <a href="{{ route('lang', ['lang' => 'en' ]) }}"><button class="btn btn-info btn-sm" id="lang-btn">EN</button></a>
                    </div>   
                </div>
            </div>
        </nav>

       
        <div class="container-fluid mt-0">
            <div class="container pl-0 pr-0">
             <!-- Menu -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">            
                        <ul class="nav navbar-nav my-menu text-uppercase">
                            
                        </ul>
                        <!-- Search box-->
                        <form class="navbar-form navbar-left" action ="">
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
            @yield('content')
        </div>

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
                        {{ __('hotline') }} : <a href="#">1800 6715 </a><br>
                        {{ __('complaints_and_warranty') }} : <a href="#">028710 88 333</a><br>
                        {{ __('timeserver') }} : <a href="#">8h-22h</a><br>
                        Email: <a href="#">info@guitarshop.com</a><br>
                    </div>
                    <div class="col-2">
                        {{ __('social_pages') }}
                    </div>                    
                </div>
                <div class="row margined-row">
                    <div class="col-6">
                        {{ __('footer_name') }}<br>
                        {{ __('address') }} : {{ __('detail_address') }}<br>
                        {{ __('phone_number') }} : <a href="#">1800 1998</a><br>
                        {{ __('hotline') }} : <a href="#">028710 120923</a><br>
                        Email: <a href="#">info@guitarshop.com</a>
                    </div>
                    <div class="col-6">
                        {{ __('payment_method') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
