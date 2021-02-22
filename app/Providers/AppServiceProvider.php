<?php

namespace App\Providers;

use App\Models\Category;
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
    }
}
