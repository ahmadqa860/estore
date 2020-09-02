@extends('master')

@section('main_content')

        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{asset('img/hero/category.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Product Categories</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="latest-product-area latest-padding">
            <div class="container">
                <div class="row product-btn d-flex justify-content-between">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                @if($categories)
                                    @foreach ($categories as $category)
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="single-product mb-60">
                                        <div class="product-img">
                                            <img height="300px" src="{{ asset('images/'. $category['cimage']) }}" alt="">
                                        </div>
                                        <div class="product-caption">
                                            <h4><a href="{{ url('shop/'.$category['curl']) }}">{{ $category['ctitle'] }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <div class="col">
                                        <p><i>No categories available...</i></p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    {{--  <div class="container">
            <div class="row">
                <div class="col">
                    <h1> iwatch shop categories</h1>
                    <p>check our categories</p>
                </div>
            </div>
        
        <div class="row">
            @if($categories)
                @foreach ($categories as $category)
                <div class="col-lg-6 col-xl-4">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{ $category['ctitle'] }}</h3>
                            <p class="card-text mb-auto">{!! $category['carticle'] !!}</p>
                            <a href="{{ url('shop/'.$category['curl']) }}" >View Product</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img class="img-fluid" src="{{ asset('images/'. $category['cimage']) }}">
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col">
                    <p><i>No categories available...</i></p>
                </div>
            @endif
        </div>
    </div>  --}}

@endsection
