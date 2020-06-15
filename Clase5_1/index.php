<?php

//composer init
//composer require firebase/php-jwt
//use \Firebase\JWT\JWT;
//http://www.slimframework.com/ //esta todo aca
//ver que .htcaccess cuando esta bien escito aparece una ruedita de configuracion.
//composer require slim/slim:"4.*"
//composer require slim/psr7 


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//use Slim\Exception\NotFoundException;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app-> setBasePath('/Programacion_III/Clase5_1');
$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true); //muestra errores

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();


