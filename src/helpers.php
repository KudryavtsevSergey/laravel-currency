<?php
if (!function_exists('currencyConvert')) {
    function currencyConvert(int $fromCurrencyId, int $toCurrencyId, $amount)
    {
        $currency = app('Currency');
        return $currency->convert($fromCurrencyId, $toCurrencyId, $amount);
    }
}
