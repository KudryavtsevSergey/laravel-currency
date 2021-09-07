<?php

use Sun\Currency\Exceptions\CourseNotFoundException;
use Sun\Currency\Facade;

if (!function_exists('convert')) {

    /**
     * @param string|int $fromCurrency
     * @param string|int $toCurrency
     * @param float $amount
     * @return float
     * @throws CourseNotFoundException
     */
    function convert($fromCurrency, $toCurrency, float $amount): float
    {
        /** @var Currency $currency */
        $currency = app(Facade::FACADE);
        return $currency->convert($fromCurrency, $toCurrency, $amount);
    }
}
