<?php

namespace Sun\Currency;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade
{
    const FACADE = 'Currency';

    protected static function getFacadeAccessor()
    {
        return self::FACADE;
    }
}
