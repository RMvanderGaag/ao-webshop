<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use DB;
use Auth;

class OrderController extends Controller
{
    /**
     * Als een bestelling is geplaats dan word er een nieuwe record aangemaakt in de Database
     */
    public function store(Request $request){
      Order::create([
          'user_id' => $request->user_id,
          'user_email' => $request->user_email,
          'user_name' => $request->user_name,
          'order_price' => $request->order_price
      ]);

      return redirect('/destroy-cart');
    }

    /**
     * Haalt alle orders op van de gene die op dit moment is ingelogd 
     */
    public function index(){
      $orders = DB::table('orders')->get()->where('user_id', Auth::user()->id);

      return view('orderDetails')->with([
        'orders' => $orders
      ]);
    }
}
