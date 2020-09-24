<?php
if (!function_exists('currencyConvert')) {
    function currencyConvert(int $fromCurrencyId, int $toCurrencyId, $amount)
    {
        /** @var Currency $currency */
        $currency = app('Currency');
        return $currency->convert($fromCurrencyId, $toCurrencyId, $amount);
    }
}
