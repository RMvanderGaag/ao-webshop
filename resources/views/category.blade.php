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
                <button type="button" class="btn p-0" onclick=""><i class="fas fa-cart-plus"></i></button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection