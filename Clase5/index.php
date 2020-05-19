<?php

//echo "holas";

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

//require __DIR__ . '/vendor/autoload.php'; //no anda la ruta
require __DIR__ . '/vendor/autoload.php';

//ver que .htcaccess cuando esta bien escito aparece una ruedita de configuracion.
//http://www.slimframework.com/
$app = AppFactory::create();
$app-> setBasePath('/Programacion_III/Clase5');

$app->addErrorMiddleware(true, true, true); //muestra errores

$app->post('/persona', function(Request $request, Response $response){
    $body= $request->getParsedBody(); //ver si anda
    $files= $_FILES;//getUploadedFiles();
    $rta= array("succes"=> true, "data"=> "POST", "body"=>$body, "files"=>$files);
    $rtaJson = json_encode($rta);
    $response->getBody()->write($rtaJson);//("Hello world!");
    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(302);

});

$app->get('/persona/{id}', function (Request $request, Response $response, array $args) { //$args recibe las variables, q yo le mande a mi ruta
    // '/persona' original  // '/persona[/]' esto significa que puedo escribir en el postman /persona o /persona/
    // '/persona/{id}' creo una variable id, que esto va a estar en $args
    //'/persona[/{id}]' y preguntar si viene o no el id
    // '/persona/{detalle}/{id}' creo una variable id, que esto va a estar en $args
    //localhost/Programacion_III/Clase5/persona/completo/12 esto para probarlo en POSTMAN
    $queryString = $request-> getQueryParams(); //trae los parametros
    // localhost/Programacion_III/Clase5/persona/12?nombre=juan&apellido=perez ruta de POSTMAN en get, agregue esos parametros
    $headers = $request->getHeader(); //no me anduvo
    $rta = array("succes"=>true, "data"=> $args, "query"=>$queryString); //"headers"=> $headers
    $rtaJson= json_encode($rta);
    $response->getBody()->write($rtaJson);//("Hello world!");
    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(302);
    
});

$app->put('/persona', function(Request $request, Response $response){

    $response->getBody()->write($rtaJson);//("Hello world!");
    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(302);

});

$app->delete('/persona', function(Request $request, Response $response){

    $response->getBody()->write($rtaJson);//("Hello world!");
    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(302);

});

$app->group('/alumno', function($group){

    //$group->map(['GET', 'DELETE', 'PATCH', 'PUT'], '[/]', function(Request $request, Response $response)
    $group->get('/{id}', function(Request $request, Response $response){

        $response->getBody()->write($rtaJson);//("Hello world!");
        return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(302);
    });
});

$app->run();