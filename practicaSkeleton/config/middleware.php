<?php
//namespace Config;

use Slim\App;
use App\middleware\BeforeMiddleware;
use App\middleware\AfterMiddleware;

return function(App $app){

    $app->addbodyParsingMiddleware();

    $app->add(new BeforeMiddleware());
    $app->add(new AfterMiddleware());
    // $app->add(BeforeMiddleware::class);
};