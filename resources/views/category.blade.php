@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{$product->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection