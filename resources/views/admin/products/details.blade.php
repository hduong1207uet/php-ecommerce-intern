@extends('admin.app')

@section('admin-content')
<div class="row mt-3 ml-3 mb-3"> 
    {{ $product->name }}
</div>

<div class="row">
    <div class="col-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-images" role="tab" aria-controls="nav-home" aria-selected="true">{{ __('images') }}</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-profile" aria-selected="false">{{ __('comments') }}</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-rates" role="tab" aria-controls="nav-contact" aria-selected="false">{{ __('rates') }}</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-images" role="tabpanel" aria-labelledby="nav-image-tab">
                @include('admin.images.index')
            </div>
            <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
                @include('admin.comments.index')
            </div>
            <div class="tab-pane fade" id="nav-rates" role="tabpanel" aria-labelledby="nav-rates-tab">...</div>
        </div>
    </div>
</div>
@endsection
