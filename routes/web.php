<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('contact', 'ContactController@index')->name('contact');
Route::get('categorii/{category}', 'CategoryController@index')->name('categories.index');
Route::get('categorie/{category}', 'CategoryController@show')->name('category.show');
Route::get('produs/{product}', 'ProductController@show')->name('product.show');

// Route::resource('category', CategoryController::class)->except(['index']);
// Route::get('categorie/{category}', 'CategoryController@show')->name('category');

Auth::routes();
Route::mediaLibrary();
