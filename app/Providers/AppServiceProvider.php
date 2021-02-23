<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->shareCategoriesWithNav();

        // $this->registerBladeDirectives();
    }

    protected function shareCategoriesWithNav()
    {
        view()->composer([
            'partials.nav',
        ], function ($view) {
            $view->with('categories', Cache::remember('categories', 7200, function () {
                return Category::query()->visibleInNav()
                // return Category::whereNotIn('id', [30, 35])
                    ->parent()
                    ->ordered()
                    ->get();
            }));
        });

        // Settings sharing
        view()->composer([
            'home',
            'pages.contact',
        ], function ($view) {
            $view->with('settings', Cache::remember('settings', 7200, function () {
                return Setting::latest()->first();
            }));
        });
    }

    protected function registerBladeDirectives()
    {
        Blade::if('admin', function () {
            return backpack_user()
                && isset(backpack_user()->roles)
                && backpack_user()->roles->first()->name === 'admin';
        });
    }
}
