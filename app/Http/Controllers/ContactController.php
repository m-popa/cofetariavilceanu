<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    /**
     * Show the application Contact Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.contact');
    }
}
