<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('produs/{product}', 'ProductController@show')->name('product.show');
Route::get('categorii/{category}', 'CategoryController@index')->name('categories.index');
Route::get('contact', 'ContactController@index')->name('contact');

Auth::routes();
Route::mediaLibrary();
