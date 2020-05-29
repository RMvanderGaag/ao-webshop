

@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@if (Session::has('cart'))
    
    <h4>There is/are {{ Session::get('cart')->totalQty }} item(s) inside of the shopping cart</h4>
    <div class="table mt-5">
    @foreach ($products as $product)
        <div class="row border-bottom align-items-center">
            <img class="checkoutImg" src="{{ $product['item']['image'] }}" alt="">
            <h4 class="ml-5">{{ $product['item']['name'] }}</h4>
            <h4 class="ml-5">&euro; {{$product['price']}}</h4>
            <div class="btn-group">
            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Remove 1 item</a></li>
                    <li><a href="#">Remove all</a></li>
                </ul>
            </div>
        </div>
    @endforeach
    </div>
    <div>
        <strong>Total: {{ $totalPrice }}</strong>
    </div>

    <div>
        <button type="button" class="btn btn-success">Proceed to checkout</button>
    </div>
@else
    <h3>There are no items inside the shopping cart</h3>
    <a href="{{ route('home') }}">Continue shopping</a>
@endif
</div

@endsection