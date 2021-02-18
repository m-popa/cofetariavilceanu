<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
    ],
    'namespace'  => 'App\Http\Controllers\Admin',
    'as'         => 'admin.',
], function () { // custom admin routes
    Route::crud('product', 'ProductCrudController');
    Route::crud('categories', 'CategoryCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('price-type', 'PriceTypeCrudController');
    Route::crud('setting', 'SettingCrudController');
}); // this should be the absolute last line of this file