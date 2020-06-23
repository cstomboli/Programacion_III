<?php

//Primero composer init
//controladores, modelos, bases de dato, respuesta y vista.
// 
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

/*
$usuarios = array();
$mensaje = array();


$app->get('/', function (Request $request, Response $response, $args) {
    
    try {
        $conStr = 'mysql:host = localhost; dbname =prog3';
        $user= 'root'; //'LENOVO X1carbon';       //acceso denegado
        $pass= "";
        $pdo= new PDO($conStr, $user, $pass);
        $insert= "INSERT INTO alumnos (`id`, `nombre`, `legajo`, `localidad_id`) VALUES (????)";
        //$query = $pdo->prepare("SELECT * FROM alumnos");
        $query = $pdo->prepare($insert);
        $query->bindParam(1, $id);
        $query->bindParam("juan", $nombre);
        $query->bindParam(123, $legajo);
        $query->bindParam(1, $localidad_id);


        $query->execute();
        
        //$resultado = $query->fetchall();
        $resultado = $pdo->lastInsertId();
        
        print_r($resultado); //vacio
        $mensaje = "Conexion ok"; //$resultado; ACA CAMBio el mensaje
    } catch (PDOException $e) {
        $mensaje= $e->getMessage();
        echo("Error" .$e->getMessage());
    }
    
    $body= $request->getParsedBody(); 
    $rta= array("succes"=> true, "mensaje"=> $mensaje);//"data"=> "POST", "body"=>$body);
    
    $rtaJson = json_encode($rta);
    $response->getBody()->write($rtaJson);   //("Hello world!")

    return $response
    ->withHeader('Content-Type', 'application/json')    
    ->withStatus(302);
});
*/
$app->run();