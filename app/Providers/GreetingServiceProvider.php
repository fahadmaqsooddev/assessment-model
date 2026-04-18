<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GreetingService;
class GreetingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(GreetingService::class,function($app){
            return new GreetingService('John Doe');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
