<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use DB;
use Auth;

class OrderController extends Controller
{
    public function store(Request $request){
      Order::create([
          'user_id' => $request->user_id,
          'user_email' => $request->user_email,
          'user_name' => $request->user_name,
          'order_price' => $request->order_price
      ]);

      return redirect('/destroy-cart');
    }

    public function index(){
      $orders = DB::table('orders')->get()->where('user_id', Auth::user()->id);

      return view('orderDetails')->with([
        'orders' => $orders
      ]);
    }
}
