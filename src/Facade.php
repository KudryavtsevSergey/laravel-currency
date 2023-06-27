<?php

declare(strict_types=1);

namespace Sun\Currency;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

/**
 * @method static Converter createConverter(string|int $fromCurrency, string|int $toCurrency)
 */
class Facade extends IlluminateFacade
{
    public const FACADE_ACCESSOR = 'Currency';

    protected static function getFacadeAccessor(): string
    {
        return self::FACADE_ACCESSOR;
    }
}
