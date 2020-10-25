<?php

use Sun\Currency\Exceptions\CourseNotFoundException;
use Sun\Currency\Facade;

if (!function_exists('convert')) {

    /**
     * @param string $fromCurrency
     * @param string $toCurrency
     * @param float $amount
     * @return float
     * @throws CourseNotFoundException
     */
    function convert(string $fromCurrency, string $toCurrency, float $amount): float
    {
        /** @var Currency $currency */
        $currency = app(Facade::FACADE);
        return $currency->convert($fromCurrency, $toCurrency, $amount);
    }
}
