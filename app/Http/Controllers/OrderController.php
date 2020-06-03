<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

class OrderController extends Controller
{
    public function store(Request $request){
      Order::create([
          'user_id' => $request->user_id,
          'user_email' => $request->user_email,
          'user_name' => $request->user_name,
          'order_price' => $request->order_price
      ]);

      return redirect('/');
    }
}
