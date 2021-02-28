<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Backpack\PageManager\app\Models\Page;

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
        $subcategory = Category::first();

        return view('home', [
            'settings' => $settings,
            'categories' => $categories,
            'disable_description' => $disable_description,
            'subcategory' => $subcategory,
        ]);
    }

    public function pages($slug, $subs = null)
    {
        $page = Page::findBySlug($slug);

        if (!$page) {
            abort(404, 'Înapoi la <a href="'.url('').'">Pagina principala</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();

        return view('pages.'.$page->template, $this->data);
    }
}
