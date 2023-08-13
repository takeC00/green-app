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
        app()->bind('App\MyClasses\MyService', function($app){
            $myservice = new MyService();
            $myservice->setId(0);
            return $myservice;
        });
    }
}
