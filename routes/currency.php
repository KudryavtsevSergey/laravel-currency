<?php

use Illuminate\Routing\Router;

Route::group(['prefix' => 'courses', 'namespace' => '\Sun\Currency\Http\Controllers', 'middleware' => ['web']], function (Router $router) {
    $router->get('/', [
        'uses' => 'CourseController@index',
        'as' => 'courses.get',
    ]);

    $router->post('/', [
        'uses' => 'CourseController@store',
        'as' => 'courses.set',
    ]);
});
