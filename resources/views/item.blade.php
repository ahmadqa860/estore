@extends('master');

@section('main_content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{ $item['ptitle'] }}</h1>
             <p>
                <img src="{{ asset('images/' .$item['pimage']) }}" alt="" class="img-fluid" width="400">
            </p>
            <p>{!! $item['particle'] !!}</p>
            <p>Price: <b>${{ $item['price'] }}</b></p>
            <p>
                @if(!Cart::get($item['id']))
                <button data-pid={{ $item['id'] }} type="button" class="btn btn-success ml-3 add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add To Cart</button>
                @else
                <button disabled data-pid={{ $item['id'] }} type="button" class="btn btn-success ml-3 add-to-cart-btn">Product in cart</button>
                @endif
                
                <a href="{{ url('shop/cart') }}" class="btn btn-primary">To Cart</a>
            </p>
        </div>
    </div>
</div>
@endsection