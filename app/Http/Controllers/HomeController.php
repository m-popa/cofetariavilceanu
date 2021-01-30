<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application Home Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::whereHas('products')->whereNull('parent_id')->where('id', '!=', 7)->get();
        $gelaterie = Category::whereId(7)->first();
        return view('home', compact('products', 'categories', 'gelaterie'));
    }
}
