<?php

namespace Sun\Currency;

use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__ . '/../config/currency.php' => config_path('currency.php')
        ], 'currency-config');

        $this->loadRoutesFrom(__DIR__ . '/../routes/currency.php');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/currency.php', 'currency');

        $this->app->singleton('Currency', Currency::class);
    }
}
