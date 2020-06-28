<?php
namespace Config;
use Slim\Routing\RouteCollectorProxy;
use App\Controllers\AlumnosController;
//use App\Middleware\BeforeMiddleware;
//use App\Middleware\AlumnoValidateMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function($app)
{
    //$app->get('/registro', usuarioController::class.':add');
    $app->get('/', function (Request $request, Response $response) {
       
        $response->getBody()->write('Hello world!');

        return $response;
    });

    $app->group('/alumnos', function(RouteCollectorProxy $group)
    {
        $group->get('/', AlumnosController::class.':getAll');  //ver si esta bien >setName('helo');//
        $group->get('/{id}', AlumnosController::class.'cambiar');
    });

    $app->group('/localidades', function(RouteCollectorProxy $group)
    {
        $group->get('[/]', AlumnosController::class.':getAll');  //ver si esta bien
        $group->get('/{id}', AlumnosController::class.'cambiar');
    });
};