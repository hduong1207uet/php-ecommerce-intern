@extends('client.app')

@section('home-content')
    <!-- Banner -->
    <div class="row banner-div">    
        <div id="carousel_banner_Indicators" class="carousel slide " data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images_assets/products/casio-music-fest-touch-your-dream-bn.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images_assets/products/khuyen-mai-mua-online-vts.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images_assets/products/thang-4-uu-dai-qua-tang-chat-lu.png') }}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel_banner_Indicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carousel_banner_Indicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <!-- Shop Policy -->
            <div class="row justify-content-between policy-row">
                <!-- Trả góp -->
                <div class="policy-col">                    
                    <div class="col-md-4 policy-col-content p-0 m-0">
                        <i class="fab fa-cc-amazon-pay icon-policy"></i>
                    </div>
                    <div class="col-md-8 policy-col-content">
                        <p>
                            <b>{{ __('installment') }}</b><br>
                            {{ __('purchase_with_0_percent_interest') }}
                        </p>                                
                    </div>
                </div>
                <!-- Vận chuyển -->
                <div class="policy-col"> 
                    <div class="col-md-4 policy-col-content p-0 m-0">
                        <i class="fas fa-truck icon-policy"></i>
                    </div>
                    <div class="col-md-8 policy-col-content">
                        <p>
                            <b>{{ __('transportation') }}</b><br>
                            {{ __('professional_and_fast') }}
                        </p>                                
                    </div>
                </div>
                <!-- Bảo hành -->
                <div class="policy-col">
                    <div class="col-md-4 policy-col-content p-0 m-0">
                        <i class="fas fa-shield-alt icon-policy"></i>
                    </div>
                    <div class="col-md-8 policy-col-content">
                        <p>
                            <b>{{ __('guarentee') }}</b><br>
                            {{ __('efficiency_quality') }}
                        </p>                                
                    </div>
                </div>
                <!-- Đại lý -->
                <div class="policy-col">
                    <div class="col-md-4 policy-col-content p-0 m-0">
                        <i class="fas fa-home icon-policy"></i>
                    </div>
                    <div class="col-md-8 policy-col-content icon-policy">
                        <p>
                            <b>{{ __('agency') }}</b><br>
                            {{ __('spread_throughout_Vietnam') }}
                        </p>                                
                    </div>
                </div>
            </div>

            <!-- Recommended guitar -->
            <div class="row recommended-guitar title-row margined-row">
                    <div class="col-11">
                        <h5 class="font-weight-bold">{{ __('recommended_guitar') }}</h5>
                    </div>
                    <div class="col-1 p-2">
                        <!-- Indicators previous-->
                        <a class="carousel-control-prev" href="#carousel_recommend_Indicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>                            
                        </a>
                        <!-- Indicators next-->
                        <a class="carousel-control-next" href="#carousel_recommend_Indicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>                            
                        </a>
                    </div>
            </div>
            <div class="row recommended-guitar content-row">
                <div class="container-fluid p-1 m-0">
                    <div id="carousel_recommend_Indicators" class="carousel slide " data-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Recommended guitar- Page 1-->
                            <div class="carousel-item active">
                                <div class="row justify-content-between">
                                    @foreach ($recommededGuitars as $recommededGuitar)
                                        <div class="card client-card">
                                            <img class="card-img-top" src="{{ asset('images_assets/products/' . $recommededGuitar->featured_img) }}" alt="Card image cap">
                                            <div class="card-body client-card-body">
                                                <h5 class="card-title">{{ $recommededGuitar->name }}</h5>
                                                <h6 class="card-price">{{ $recommededGuitar->price }} $</h6>                               
                                                <div class="row">
                                                    <form id="add_product_{{ $recommededGuitar->id }}" action="{{ route('add_product_to_cart', $recommededGuitar->id) }}" method="post">
                                                        @csrf                                                    
                                                        <button class="btn btn-primary btn_add_product_to_cart" data-id="{{ $recommededGuitar->id }}" type="button">{{ __('add_to_cart') }}</button>
                                                    </form>
                                                    <a href="{{ route('view_product_detail', $recommededGuitar->id) }}" class="btn btn-danger">{{ __('view_details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                                              
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>                             
            </div>

            <!-- Acoustic guitar -->
            <div class="row acoustic-guitar title-row margined-row">
                <div class="col-11">
                    <h5 class="font-weight-bold">{{ __('acoustic_guitar') }}</h5>
                </div>
                <div class="col-1 p-2">
                    <!-- Indicators previous-->
                    <a class="carousel-control-prev" href="#carousel_acoustic_Indicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>                        
                    </a>
                    <!-- Indicators next-->
                    <a class="carousel-control-next" href="#carousel_acoustic_Indicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>                        
                    </a>
                </div>
            </div>
            <div class="row acoustic-guitar content-row">
                <div class="container-fluid p-1 m-0">
                    <div id="carousel_acoustic_Indicators" class="carousel slide " data-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Recommended guitar- Page 1-->
                            <div class="carousel-item active">
                                <div class="row justify-content-between">
                                    @foreach ($acousticGuitars as $acousticGuitar)
                                        <div class="card client-card">
                                            <img class="card-img-top" src="{{ asset('images_assets/products/' . $acousticGuitar->featured_img) }}" alt="Card image cap">
                                            <div class="card-body client-card-body">
                                                <h5 class="card-title">{{ $acousticGuitar->name }}</h5>
                                                <h6 class="card-price">{{ $acousticGuitar->price }} $</h6>                                       
                                                <div class="row">
                                                    <form id="add_product_{{ $acousticGuitar->id }}" action="{{ route('add_product_to_cart', $acousticGuitar->id) }}" method="post">
                                                        @csrf                                                    
                                                        <button class="btn btn-primary btn_add_product_to_cart" data-id="{{ $acousticGuitar->id }}" type="button">{{ __('add_to_cart') }}</button>
                                                    </form>
                                                    <a href="{{ route('view_product_detail', $acousticGuitar->id) }}" class="btn btn-danger">{{ __('view_details') }}</a>
                                                </div>    
                                            </div>
                                        </div>
                                    @endforeach                                                              
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>

            <!-- Classic guitar -->
            <div class="row classic-guitar title-row margined-row">
                <div class="col-11">
                    <h5 class="font-weight-bold">{{ __('classic_guitar') }}</h5>
                </div>
                <div class="col-1 p-2">
                    <!-- Indicators previous-->
                    <a class="carousel-control-prev" href="#carousel_classic_Indicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>                        
                    </a>
                    <!-- Indicators next-->
                    <a class="carousel-control-next" href="#carousel_classic_Indicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>                        
                    </a>
                </div>
            </div>
            <div class="row classic-guitar content-row">
                <div class="container-fluid p-1 m-0">
                    <div id="carousel_classic_Indicators" class="carousel slide " data-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Recommended guitar- Page 1-->
                            <div class="carousel-item active">
                                <div class="row justify-content-between">
                                    @foreach ($classicGuitars as $classicGuitar)
                                        <div class="card client-card">
                                            <img class="card-img-top" src="{{ asset('images_assets/products/' . $classicGuitar->featured_img) }}" alt="Card image cap">
                                            <div class="card-body client-card-body">
                                                <h5 class="card-title">{{ $classicGuitar->name }}</h5>
                                                <h6 class="card-price">{{ $classicGuitar->price }} $</h6>
                                                <div class="row">
                                                    <form id="add_product_{{ $classicGuitar->id }}" action="{{ route('add_product_to_cart', $classicGuitar->id) }}" method="post">
                                                        @csrf                                                    
                                                        <button class="btn btn-primary btn_add_product_to_cart" data-id="{{ $classicGuitar->id }}" type="button">{{ __('add_to_cart') }}</button>
                                                    </form>                                                                                       
                                                    <a href="{{ route('view_product_detail', $classicGuitar->id) }}" class="btn btn-danger" style="float:left">{{ __('view_details') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach                                                              
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Guitar Brands -->
    <div class="row guitar-brand margined-row">
        
    </div>
@endsection
