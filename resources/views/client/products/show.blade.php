@extends('client.app')

@section('home-content')
<div class="row">
    <div class="container p-0">
        <div class="row mb-3 mt-3">
            <div class="col-4">
			    <img src="{{ asset('images_assets/products/' . $product['featured_img']) }}" class="img-fluid mx-auto d-block img-thumbnail" alt="Card image cap">
            </div>
            <div class="col-8">
                <h5 class="mb-3">{{ $product->name }}</h5>                                    
                    <p><span class="mr-1 text-danger"><strong>${{ $product->price }}</strong></span></p>
                    <p class="pt-1">
                        <h6><b>{{ __('top_side') }}</b> : {{ $product->top_side}}</h6> 
                        <h6><b>{{ __('back_side') }}</b> : {{ $product->back_side}}</h6>
                        <h6><b>{{ __('hip_side') }}</b> : {{ $product->hip_side}}</h6>
                        <h6><b>{{ __('strings') }}</b> : {{ $product->strings}}</h6>
                        <h6><b>{{ __('neck') }}</b> : {{ $product->neck}}</h6>
                        <h6><b>{{ __('buckcle') }}</b> : {{ $product->buckcle}}</h6>
                    </p>
                    <hr>               
                    <div class="table-responsive mb-3">
                        <div class="input-group w-25">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                    <span><i class="fas fa-minus"></i></span>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                    <span><i class="fas fa-plus"></i></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-md mr-1 mb-2">{{ __('buy_now') }}</button>
                    <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i class="fas fa-shopping-cart pr-2"></i>{{ __('add_to_cart') }}</button>
            </div>
        </div>    
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-description" role="tab" aria-controls="nav-home" aria-selected="true">{{ __('description') }}</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-profile" aria-selected="false">{{ __('comments') }}</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-rates" role="tab" aria-controls="nav-contact" aria-selected="false">{{ __('rates') }}</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-home-tab">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                    <div class="tab-pane fade" id="nav-rates" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                </div>
            </div>
        </div>
        <hr>

        <!-- Related product -->
        <div class="row">
            <h2 class="text-center font-weight-bold mb-5 mt-1">{{ __('related_products') }}</h2>
            <div class="row d-flex equal">            
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="  col-md-3 mb-4">
                        <div class="card h-100 border-0">
                            <div class="card-img-top">
                                <img src="{{ asset('images_assets/products/' . $relatedProduct['featured_img']) }}" class="img-fluid mx-auto d-block img-thumbnail" alt="Card image cap">
                            </div>
                            <div class="card-body text-center">
                                <h4 class="card-title">
                                    <a href="{{ route('view_product_detail', $relatedProduct['id']) }}" class="text-dark text-uppercase small"> {{ $relatedProduct['name'] }}</a>
                                </h4>
                                <h5 class="card-price small text-danger">
                                    {{ $relatedProduct['price'] }} $
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><!-- End related product row-->
		<hr>

        <div class="row">
            @include('client.products.comments')
        </div>
    </div><!-- End container row-->
</div>
@endsection
