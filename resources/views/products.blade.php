@extends('master')

@section('main_content')
    {{-- <div class="container">
        <div class="row">
            <div class="col mb-5">
                <h1>{{ $products[0]->ctitle }} products</h1>
                <p>Our site is for watches and is the best ever!</p>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                
            <div class="col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <img style="height:300px !important;" src="{{ asset('images/' .$product->pimage) }}" class="img-fluid">
                  <div class="card-body">
                      <h3>{{ $product->ptitle }}</h3>
                      <p class="card-text">{!! $product->particle !!}</p>
                      <p class="card-text"> Price: <b>${{ $product->price }}</b></p>
                      <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="{{url('shop/' . $product->curl . '/' . $product->purl ) }}"class="btn btn-primary">More details</a>
                        @if(! Cart::get($product->id))
                        <button data-pid={{ $product->id }} type="button" class="btn btn-success ml-3 add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add To Cart</button>
                        @else
                        <button disabled data-pid={{ $product->id }} type="button" class="btn btn-success ml-3 add-to-cart-btn">Product in cart</button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
        </div>
        <div class="row">
          <div class="col">
            {{ $products->links() }}
          </div>
        </div>
    </div> --}}

    <div class="slider-area ">
      <!-- Mobile Menu -->
      <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('img/hero/category.jpg') }}">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>{{ $products[0]->ctitle }} products list</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <section class="product_list section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <form action="#">
                            <input type="text" name="#" placeholder="Search keyword">
                            <i class="ti-search"></i>
                        </form>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Category</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
              <div class="product_list">
                  <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-6 col-sm-6">
                          <div class="single_product_item">
                              <img src="{{ asset('images/' .$product->pimage) }}" alt="" class="img-fluid">
                              <h3> <a href="{{url('shop/' . $product->curl . '/' . $product->purl ) }}">{{ $product->ptitle }}</a> </h3>
                              <p>${{ $product->price }}</p>
                          </div>
                        </div>
                        @endforeach
                  </div>
              </div>
          </div>
        </div>    
    </div>
</section>



@endsection
