<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fix for older databases.
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Everytime a partials.slideshow view is loaded, attach slideshow data.
        view()->composer('partials.slideshow', function($view) {
            $view->with('slideshow', \App\Gallery::where('slideshow', 1)->get());
        });
    }
}
