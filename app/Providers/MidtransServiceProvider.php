<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Midtrans\Config;

class MidtransServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Config::$isProduction = config('midtrans.is_production');
        Config::$serverKey = config('SB-Mid-server-S7HawvLJ82y7BOsX-ShOVRrR');
        Config::$clientKey = config('SB-Mid-client-WSg3IJ1rHHpMj6g-');
    }
}
