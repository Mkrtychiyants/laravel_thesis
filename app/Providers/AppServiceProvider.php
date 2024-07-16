<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        // Auth::extend('admin', function (Application $app, string $name, array $config) {
        //     // Return an instance of Illuminate\Contracts\Auth\Guard...
 
        //     return new AdminGuard(Auth::createUserProvider($config['provider']));
        // });
    }
}
