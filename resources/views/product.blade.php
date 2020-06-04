@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session()->has('message'))
        <div class="alert alert-success">
        {{ session()->get('message') }}
        </div>
        @endif
        <div class="row mt-5">
            <div class="col-6">
                <img class="w-75" src="{{ $product->image }}" alt="{{ $product->name }} image">
            </div>
            <div class="col-6">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>

                <div class="mt-5">
                    @guest
                        <p>Add this product to your cart? Make sure you <a href="{{ route('login') }}"><u>login</u></a> first!</p>
            
                    @else
                        <div>
                            <a href="{{ route('cart.addToCart', ['id' => $product->id]) }}" class="btn-success px-5 py-2"><i class="fas fa-cart-plus"></i></a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

    </div>
@endsection