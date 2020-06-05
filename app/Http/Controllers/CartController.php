<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    /**
     * Zodra er producten in de shopping terecht moeten komen word deze functie uitgevoerd
     * @param int $id
     */
    public function addToCart($id){
        //Het product word opgehaald met de parameter
        $product = Product::find($id);
        //Er word gekeken of er al een cart bestaat
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        //Een nieuwe cart word aangemaakt
        $cart = new Cart($oldCart);
        //Er word een functie uitgevoerd in Cart.php om de producten toe te voegen
        $cart->add($product, $product->id);

        //De cart word opgeslagen in de Session
        Session::put('cart', $cart);
        return redirect()->back()->with('message', 'Item has been added to your shopping cart!');
    }

    /**
     * De inhoud van de cart word weergegeven
     */
    public function showCart() {
        //Eerst word er gekeken of er al een cart in de session zit
        if(!Session::has('cart')){
            return view('cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        //De view word ingeladen en daarmee worden alle producten en de totaalprijs mee meegestuurd
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * In de shopping cart heb je de optie om het product aantal te verminderen
     * @param int $id
     */
    public function reduceProduct($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        //Er word een functie uitgevoerd in Cart.php om de één product te verwijderen
        $cart->removeOneItem($id);

        //De cart word aan de session toe gevoegd
        Session::put('cart', $cart);

        return redirect()->back()->with('message', 'Item has been removed from your shopping cart!');
    }

    /**
     * Alle producten van de zelfde soort worden verwijderd
     * @param int $id
     */
    public function removeProduct($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        //Er word een functie uitgevoerd in Cart.php om alle producten te verwijderen
        $cart->removeItem($id);

        Session::put('cart', $cart);
        return redirect()->back()->with('message', 'Items are removed from your shopping cart!');
    }

    /**
     * De afreken pagina word weergegeven
     */
    public function checkoutPage(){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        //Naar deze pagina worden alle producten en het totaalbedraag meegestuurd
        return view('checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Als de gebruiker de betaling heeft afgerond word de shopping cart weer leeggemaakt
     */
    public function destroyCart(){
        $cart = Session::get('cart');
        //Er word een functie uitgevoerd in Cart.php om de cart te verwijderen
        $cart->destroy();
        
        return redirect()->route('home')->with('message', 'Your order has been placed!');
    }

}
