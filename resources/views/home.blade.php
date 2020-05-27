@extends('layouts.app')

@section('content')
<header class="header container">
    <div class="text-center">
        <h3 class="display-4">Pokemon</h3>
    </div>
    <div class="row">
        @foreach ($categories as $category)
        <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{$category->image}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$category->name}} Pokémon</h5>
                <a href="{{ route('category', ['category' => $category->name]) }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        
        @endforeach
    </div>
</header>
@endsection
