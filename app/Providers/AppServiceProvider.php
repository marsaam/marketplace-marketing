<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
       // Definisikan gate untuk peran 'admin'
       Gate::define('merchant', function ($user) {
        return $user->hasRole('merchant');
    });

    // Definisikan gate untuk peran 'admin'
    Gate::define('customer', function ($user) {
        return $user->hasRole('customer');
    });
    }
}
