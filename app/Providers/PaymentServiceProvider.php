<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PaymentService\PaypalAPI; // Ensure the correct namespace is used
class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaypalAPI::class, function ($app) {
            $transactionId = "the test coder" . rand(0, 1000);
            return new PaypalAPI($transactionId);
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
