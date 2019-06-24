<?php

namespace Sun\Currency;

use Illuminate\Contracts\Routing\Registrar as Router;
use Illuminate\Support\Facades\Facade as IlluminateFacade;
use Route;

class Facade extends IlluminateFacade
{
    protected static function getFacadeAccessor()
    {
        return 'Currency';
    }

    /**
     * @param array $options
     * @return void
     */
    public static function routes(array $options = [])
    {
        $defaultOptions = ['prefix' => 'courses', 'namespace' => '\Sun\Currency\Http\Controllers'];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function (Router $router) {
            (new RouteRegistrar($router))->routes();
        });
    }
}
