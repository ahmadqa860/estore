@extends('master')

@section('main_content')


<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('img/hero/category.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Card List</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


  <section class="cart_area section_padding">
    <div class="container">
        @if($cart)
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>
                    <div class="media">
                        <div class="d-flex">
                        <img src="{{ asset('images/' .$item['attributes']['image']) }}" alt="" />
                        </div>
                        <div class="media-body">
                        <p>{{ $item['name'] }}</p>
                        </div>
                    </div>
                    </td>
                    <td>
                    <h5>{{ $item['price'] }}</h5>
                    </td>
                    <td>
                        <div >
                            <a data-op="minus" data-pid="{{ $item['id'] }}" href="#" class="input-number-decrement update-cart-btn"><span style="color: black"><i class="fas fa-minus-circle"></i></span></a>
                        <input class="text-center" size="1" type="text" value="{{ $item['quantity'] }}">
                        <a data-op="plus" data-pid="{{ $item['id'] }}" href="#" class="input-number-increment update-cart-btn"><span style="color: black"><i class="fas fa-plus-circle"></i></span></a>
                        </div>
                    </td>
                    <td>
                        <h5>{{ $item['quantity'] * $item['price'] }}</h5>
                    </td>
                    <td class="text-center"><a href="{{ url("shop/remove-item/".$item['id']) }}" class="text-danger remove-item-btn"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                @endforeach
                
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>${{ Cart::getTotal() }}</h5>
                  </td>
                </tr>
                
              </tbody>
            </table>
            <div class="checkout_btn_inner float-right">
                <a class="btn_1 btn-light bg-danger" href="{{ url('shop/clear-cart') }}">Clear Cart</a>
                @if(! Session::has('user_id'))
                    <span class="text-danger">Sign in before Proceed to checkout</span>
                @else
                <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                @endif
            </div>
          </div>
          @else 
                <p><i>the cart is empty...</i></p>
            @endif
        </div>
    </section>

@endsection