<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton('myservice', 'App\MyClasses\PowerMyService');
        app()->singleton('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
        echo "aa";
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        echo "a<br>";
    }
}
