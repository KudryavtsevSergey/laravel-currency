<?php

namespace Sun\Currency;

use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/currency.php' => config_path('currency.php')
        ], 'currency-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/currency.php', 'currency');

        $this->app->singleton(Facade::FACADE, Currency::class);
    }
}
