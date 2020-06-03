

@extends('layouts.app')

@section('content')

<div class="container">

@if (Session::has('cart') and Session::get('cart')->totalQty > 0)
    
    <h4>There is/are {{ Session::get('cart')->totalQty }} item(s) inside of the shopping cart</h4>
    <div class="table mt-5">
    @foreach ($products as $product)
        <div class="row border-bottom align-items-center">
            <img class="checkoutImg" src="{{ $product['item']['image'] }}" alt="">
            <h4 class="ml-5">{{ $product['item']['name'] }}</h4>
            <h4 class="ml-5">&euro; {{$product['price']}},-</h4>
            <h4 class="ml-5">{{ $product['qty'] }}</h4>
            <div class="ml-5 btn-group">
            <button type="button" class="btn btn-primary btn-xs dropdown-toggle float-right" data-toggle="dropdown">action <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('cart.reduceProduct', ['id' => $product['item']['id']]) }}">Remove 1 item</a></li>
                <li><a href="{{ route('cart.removeProduct', ['id' => $product['item']['id']]) }}">Remove all</a></li>
            </ul>
            </div>
        </div>
    @endforeach
    </div>
    <div>
        <strong>Total: &euro; {{ $totalPrice }},-</strong>
    </div>

    <div>
        <a href="{{ route('checkoutPage') }}" class="btn btn-success">Proceed to checkout</a>
    </div>
@else
    <h3>There are no items inside the shopping cart</h3>
    <a href="{{ route('home') }}">Continue shopping</a>
@endif
</div

@endsection