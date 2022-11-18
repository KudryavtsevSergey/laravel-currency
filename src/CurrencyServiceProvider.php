<?php

namespace Sun\Currency;

use Illuminate\Support\ServiceProvider;
use Sun\Currency\Service\CourseService;

class CurrencyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPublishing();
    }

    protected function registerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/currency.php' => config_path('currency.php')
            ], 'currency-config');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/currency.php', 'currency');

        $this->app->singleton(Facade::FACADE_ACCESSOR, Currency::class);
        $this->app->singleton(CourseService::class, CourseService::class);
    }
}
