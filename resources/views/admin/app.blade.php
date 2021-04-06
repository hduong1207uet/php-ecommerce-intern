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
    
</head>
<body>
    <div class="container-fluid ml-1">
        <div class="row mt-2">
            <div class="col-md-2">
                <h2>{{ __('Adminator') }}</h2>              
            </div>
            <div class="col-md-7">
                <!-- Search Box here-->
            </div>
            <div class="col-md-2 d-flex flex-row-reverse">
                <a href="{{ route('lang', ['lang' => 'vi']) }}"><button class="btn btn-info btn-sm" id="lang-btn">VI</button></a>
                <a href="{{ route('lang', ['lang' => 'en' ]) }}"><button class="btn btn-info btn-sm" id="lang-btn">EN</button></a>
            </div>
            <div class="col-md-1">
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
            </div>
        </div>    
                
        <div class="row">
            <div class="col-md-2 left-sidebar">         
                <div class="row side-bar-row">
                    <i class="fas fa-user fa-lg"></i> &emsp;{{ __('User_management') }}
                </div>
                <div class="row side-bar-row">
                    <i class="fas fa-guitar fa-lg"></i> &emsp;{{ __('Product_management') }}
                </div>
                <div class="row side-bar-row">
                    <i class="fab fa-first-order fa-lg"></i> &emsp;{{ __('Order_management') }}
                </div>
                <div class="row side-bar-row">
                    <i class="fab fa-first-order fa-lg"></i> &emsp;{{ __('Order_detail_management') }}
                </div>
                <div class="row side-bar-row">
                    <i class="fas fa-archive fa-lg"></i> &emsp;{{ __('Category_management') }}
                </div>
                <div class="row side-bar-row">
                    <i class="fas fa-images fa-lg"></i> &emsp;{{ __('Image_management') }}
                </div>
                <div class="row side-bar-row">
                    <i class="far fa-comments fa-lg"></i> &emsp;{{ __('Comment_management') }}
                </div>
                <div class="row side-bar-row">
                    <i class="far fa-star fa-lg"></i> &emsp;{{ __('Rate_management') }}
                </div>
            </div>
            <div class="col-md-10 right-sidebar">
                    @yield('content-admin')
            </div>
        </div>
    </div>
</body>
</html>
