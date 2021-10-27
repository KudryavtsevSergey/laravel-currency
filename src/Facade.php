<?php

namespace Sun\Currency;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade
{
    public const FACADE_ACCESSOR = 'Currency';

    protected static function getFacadeAccessor()
    {
        return self::FACADE_ACCESSOR;
    }
}
