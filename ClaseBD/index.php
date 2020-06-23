<?php

// 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//use Slim\Exception\NotFoundException;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app-> setBasePath('/Programacion_III/ClaseDB');
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true); //muestra errores

$app->get('/', function (Request $request, Response $response, $args) {
    
    try {
        $conStr = 'mysql:host =localhost:dbname =prog3';
        $pdo= new PDO($conStr, $user, $pass);
    } catch (PDOException $e) {
        echo("Error" .$e->getMessage());
    }
    
    $body= $request->getParsedBody(); 
    $rta= array("succes"=> true, "data"=> "POST", "body"=>$body);
    

    $rtaJson = json_encode($rta);
    $response->getBody()->write("Hello world!");//($rtaJson);

    return $response
    ->withHeader('Content-Type', 'application/json')    
    ->withStatus(302);
});

$app->run();