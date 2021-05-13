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
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" defer>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}" defer></script>
</head>
<body>
    @include('sweetalert::alert')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container-fluid">
                <div class="col-2">

                </div>
                <div class="col-8">                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <div class="navbar-brand">
                                <a href="{{ route('home') }}">
                                    <img class="logo" src="{{ asset('images_assets/logo.jpg') }}">
                                </a>
                            </div>
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
                            <div id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item btn-logout"  href="{{ route('logout') }}">
                                    {{ __('logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                            @endguest
                        </ul>
                        <!--language Div-->
                        <div class="d-flex flex-row-reverse mt-3">
                            <a href="{{ route('lang', ['lang' => 'vi']) }}"><button class="btn btn-info btn-sm" id="lang-btn">VI</button></a>
                            <a href="{{ route('lang', ['lang' => 'en' ]) }}"><button class="btn btn-info btn-sm" id="lang-btn">EN</button></a>
                        </div>   
                    </div>
                </div>
                <div class="col-2">
                    <a href="{{ route('cart') }}">
                        <i class="fas fa-cart-plus text-primary fa-2x"></i>
                    </a>
                </div>
            </div>
        </nav>
       
        <div class="container-fluid mt-0">            
            @yield('content')
        </div>
        
    </div>
</body>
</html>
