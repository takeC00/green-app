<?php

namespace App\Providers;

use App\MyClasses\MyService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\MyService');
    }
}
