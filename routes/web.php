<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('produs/{product}', 'ProductController@show')->name('product.show');
Route::get('categorii/{category}', 'CategoryController@index')->name('categories.index');
Route::get('galerie/{gallery}', 'GalleryController@show')->name('gallery.show');
Route::view('contact', 'pages.contact')->name('contact');
Route::post('contact', 'ContactController')->name('contact.store');

Auth::routes();
Route::mediaLibrary();
Route::get('{page}/{subs?}', ['uses' => '\App\Http\Controllers\HomeController@pages'])
    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);
