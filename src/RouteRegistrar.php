<?php

namespace Sun\Currency;

use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegistrar
{
    /**
     * @var Router
     */
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function routes()
    {
        $this->router->get('/', [
            'uses' => 'CourseController@index',
            'as' => 'courses.get',
        ]);

        $this->router->post('/', [
            'uses' => 'CourseController@store',
            'as' => 'courses.set',
        ]);
    }
}
