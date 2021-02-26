<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Show the application Home Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Category $category)
    {
        $settings = Setting::latest()->first();
        $categories = Category::whereHas('products')->where('homepage', 1)->orderBy('lft')->get();
        $disable_description = '0';

        return view('home', [
            'settings' => $settings,
            'categories' => $categories,
            'disable_description' => $disable_description,
        ]);
    }
}
