

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

@if (Cart::count() > 0)
    
    <h4>There is/are {{ Cart::count() }} item(s) inside of the shopping cart</h4>
    <div class="table mt-5">
    @foreach (Cart::content() as $item)
        <div class="row border-bottom align-items-center">
            <img class="checkoutImg" src="{{ $item->model->image }}" alt="">
            <h4 class="ml-5">{{$item->model->name}}</h4>
            
            <h4 class="ml-5">&euro; {{$item->model->price}}</h4>
            <div>
                <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button class="btn" type="submit">Remove from cart</button>
                </form>
            </div>
        </div>
    @endforeach
    </div>
@else
    <h3>There are no items inside the shopping cart</h3>
    <a href="{{ route('home') }}">Continue shopping</a>
@endif
</div

@endsection