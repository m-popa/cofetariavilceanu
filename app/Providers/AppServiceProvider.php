<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Testimonial;
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
            'partials.footer',
        ], function ($view) {
            $view->with('categories', Cache::remember('categories', 7200, function () {
                return Category::query()->visibleInNav()
                    ->parent()
                    ->ordered()
                    ->get();
            }));
        });
        //testimonials
        view()->composer([
            'partials.footer',
        ], function ($view) {
            $view->with('testimonials', Testimonial::all()->chunk(2));
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

        view()->composer('*', function ($view) {
            $view_name = str_replace('.', ' ', $view->getName());
            view()->share('view_name', $view_name);
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
