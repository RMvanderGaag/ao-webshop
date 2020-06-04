

@extends('layouts.app')

@section('content')

<div class="container">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
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
                <a class="ml-5 bg-success p-2 rounded" href="{{ route('cart.addToCart', ['id' => $product['item']['id']]) }}"><i class="text-light fas fa-plus"></i></a>
                <a class="ml-5 bg-danger p-2 rounded" href="{{ route('cart.reduceProduct', ['id' => $product['item']['id']]) }}"><i class="text-light fas fa-minus"></i></a>
                <a class="ml-5 bg-danger p-2 rounded" href="{{ route('cart.removeProduct', ['id' => $product['item']['id']]) }}"><i class="text-light fas fa-times"></i></a>
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