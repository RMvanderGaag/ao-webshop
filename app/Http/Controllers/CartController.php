<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function addToCart($id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        Session::put('cart', $cart);
        return redirect()->route('home');
    }

    public function showCart() {
        if(!Session::has('cart')){
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function reduceProduct($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeOneItem($id);

        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function removeProduct($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        Session::put('cart', $cart);
        return redirect()->back();
    }

    
    public function checkoutPage(){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

}
