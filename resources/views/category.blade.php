@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-3 m-3">
        <img class="card-img-top" src="{{$product->image}}" alt="Card image cap">
            <div class="card-body bg-light">
                <p class="card-title">Name: <b>{{ $product->name }}</b></p>
                <p>Price: <b>&euro; {{ $product->price }},-</b></p>
                <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn p-0"><i class="fas fa-cart-plus"></i></button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection