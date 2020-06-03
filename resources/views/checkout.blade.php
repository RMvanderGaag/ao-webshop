@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron mt-5">
            <h3 class="lead">User details</h3>
            <p>Name: <b>{{ Auth::user()->name }}</b></p>
            <p>Email adress: <b>{{ Auth::user()->email }}</b></p>
            <p>City: <b>{{ Auth::user()->city }}</b></p>
            <p>Street: <b>{{ Auth::user()->street }}</b></p>
            <hr>
            <h3 class="lead">Cart details</h3>
            <div class="d-inline-block">
                @foreach ($products as $product)
                    <div class="d-inline">
                        <img class="w-25" src="{{ $product['item']->image }}" alt="{{ $product['item']->name }}">
                        <span class="bg-dark text-light py-2 px-3 rounded-circle">{{ $product['qty'] }}</span>
                    </div>
                @endforeach
            </div>
            <hr>
            <p class="float-left"><b>Price: {{ $totalPrice }},-</b></p>
            <a class="float-right btn-success p-2 rounded" href="">Place order</a>
        </div>
    </div>
@endsection