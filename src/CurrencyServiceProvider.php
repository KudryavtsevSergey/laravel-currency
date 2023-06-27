<?php

declare(strict_types=1);

namespace Sun\Currency;

use Illuminate\Support\ServiceProvider;
use Sun\Currency\Service\CourseService;

class CurrencyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Facade::FACADE_ACCESSOR, Currency::class);
        $this->app->singleton(CourseService::class, CourseService::class);
    }
}
