<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * De home pagina
     */
    public function index()
    {
        $categories = Category::all();

        //Alle categorieen worden hier naartoe gestuurd
        return view('home')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Alle producten die bij de gekozen categorie hoort worden weergegeven
     */
    public function categoryPage($id)
    {
        //Alle producten die bij de categorie horen worden doorgestuurd
        $products = Product::where('cat_id', $id)->get();

        return view('category')->with([
            'products' => $products
        ]);
    }

    /**
     * De informatie pagina van het product
     * @param int $id
     */
    public function productPage($id)
    {
        //Alle prodcuten waar het meegestuurde id gelijk is aan het id in de Database worden opgehaald
        $product = Product::find($id);

        return view('product')->with([
            'product' => $product
        ]);
    }
}
