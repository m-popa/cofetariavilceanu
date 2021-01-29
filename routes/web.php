<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('contact', 'ContactController@index')->name('contact');

Auth::routes();
Route::mediaLibrary();

Route::get('/home', 'HomeController@index')->name('home');
