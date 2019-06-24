<?php

namespace Sun\Currency;

use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Currency', Currency::class);
    }
}
