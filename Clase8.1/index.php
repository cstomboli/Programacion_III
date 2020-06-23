<?php
//composer init     //composer install
//composer require slim/psr7 //composer require slim/slim:"4.*"
//composer require "illuminate/events" // composer require "illuminate/database"

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app-> setBasePath('/Programacion_III/Clase8');
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true); //muestra errores

$app->get('/', function(Request $request, Response $response){

    $response->getBody()->write("Hello world");
    return $response;

});
$app->run();