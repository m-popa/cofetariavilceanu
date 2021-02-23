<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('produs/{product}', 'ProductController@show')->name('product.show');
Route::get('categorii/{category}', 'CategoryController@index')->name('categories.index');
Route::view('contact', 'pages.contact')->name('contact');
Route::post('contact', 'ContactController')->name('contact.store');

Auth::routes();
Route::mediaLibrary();
