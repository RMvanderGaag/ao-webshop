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
        //Een nieuwe cart word aangemaakt
        $cart = new Cart();
        //Er word een functie uitgevoerd in Cart.php om de producten toe te voegen
        $cart->add($product, $product->id);

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
        $cart = new Cart();

        //De view word ingeladen en daarmee worden alle producten en de totaalprijs mee meegestuurd
        return view('cart', ['products' => $cart->items]);
    }

    /**
     * In de shopping cart heb je de optie om het product aantal te verminderen
     * @param int $id
     */
    public function reduceProduct($id){
        $cart = new Cart();

        //Er word een functie uitgevoerd in Cart.php om de één product te verwijderen
        $cart->removeOneItem($id);

        return redirect()->back()->with('message', 'Item has been removed from your shopping cart!');
    }

    /**
     * Alle producten van de zelfde soort worden verwijderd
     * @param int $id
     */
    public function removeProduct($id){
        $cart = new Cart();

        //Er word een functie uitgevoerd in Cart.php om alle producten te verwijderen
        $cart->removeItem($id);

        return redirect()->back()->with('message', 'Items are removed from your shopping cart!');
    }

    /**
     * De afreken pagina word weergegeven
     */
    public function checkoutPage(){
        $cart = new Cart();

        //Naar deze pagina worden alle producten en het totaalbedraag meegestuurd
        return view('checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Als de gebruiker de betaling heeft afgerond word de shopping cart weer leeggemaakt
     */
    public function destroyCart(){
        $cart = new Cart();
        $cart->destroy();
        //Er word een functie uitgevoerd in Cart.php om de cart te verwijderen
        return redirect()->route('home')->with('message', 'Your order has been placed!');
    }

}
