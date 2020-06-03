@extends('layouts.app')
@section('content')
    <div class="container">
        @if (!empty($orders))
        <table class="table">
            <tr>
                <th>Order number</th>
                <th>Price</th>
                <th>Order date</th>
                <th>Status</th>
            </tr>
            @foreach ($orders as $order)
               <tr>
                   <td>46{{ $order->id }}</td>
                   <td>{{ $order->order_price }}</td>
                   <td>{{ $order->created_at }}</td>
                   <td class="alert-success">Complete</td>
               </tr>
            @endforeach
        </table>
        @else
            <p>There are no orders</p>
        @endif
    </div>
@endsection