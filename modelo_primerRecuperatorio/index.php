<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//use Slim\Exception\HttpNotFoundException;

//require __DIR__ . '/vendor/autoload.php'; //no anda la ruta
require __DIR__ . '/vendor/autoload.php';
// composer init //composer require firebase/php-jwt // 
//composer require slim/psr7 //composer require slim/slim:"4.*"
//ver que .htcaccess cuando esta bien escito aparece una ruedita de configuracion.
//http://www.slimframework.com/
$app = AppFactory::create();
$app-> setBasePath('/Programacion_III/modelo_primerRecuperatorio');

$app->addErrorMiddleware(true, true, true); //muestra errores

$app->post('/usuario', function(Request $request, Response $response){
    $body= $request->getParsedBody(); //ver si anda
    //$files= $_FILES;//getUploadedFiles();
    echo("l cuerpo es" );
    $rta= array("succes"=> true, "data"=> "POST", "body"=>$body);//, "files"=>$files);
    $rtaJson = json_encode($rta);
    $response->getBody()->write($rtaJson);//("Hello world!");
    
    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(302);

});

$app->run();