<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(150);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Contracts\DistanceServiceInterface','App\Services\DistanceService');
    }
}
