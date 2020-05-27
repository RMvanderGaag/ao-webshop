<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Product;

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
    public function index()
    {
        $categories = Category::all();

        return view('home')->with([
            'categories' => $categories,
        ]);
    }

    public function categoryPage()
    {
        $products = Product::with('categories')->whereHas('categories', function ($query) {
            $query->where('name', request()->category);
        })->get();

        return view('category')->with([
            'products' => $products
        ]);
    }
}
