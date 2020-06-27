<?php
//composer init     //composer install
// composer init //composer require firebase/php-jwt // 
//jwt.como o algo asi
//http://www.slimframework.com/
//composer require slim/psr7 //composer require slim/slim:"4.*"
//https://github.com/illuminate/database
//composer require "illuminate/events" // composer require "illuminate/database"
//SI vas a composer.json aparece todo lo que esta instalado
//https://laravel.com/docs/7.x/queries Metodos a usar
//ver Database / Eloquent ORM
//ver relaciones
use Illuminate\Database\Capsule\Manager as Capsule;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;


//https://github.com/vlucas/phpdotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

require __DIR__ . '/vendor/autoload.php';
require './config/capsule.php';
require './models/alumno.php';


$app = AppFactory::create();
$app-> setBasePath('/Programacion_III/Clase8.1');
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true); //muestra errores

$app->get('/', function(Request $request, Response $response){
    //$users = Capsule::table('alumnos')->get();  // Trae todos
    //$users = Capsule::table('alumnos')->where('legajo', '>', 457)->get(); //Trae Legajo mayor a 457
    $users = Capsule::table('alumnos')
    ->where('legajo', '>', 457)
    ->get();
    $response->getBody()->write(json_encode($users));//("Hello Tita");
    return $response;

});

$app->get('/increment', function(Request $request, Response $response){
    //$users = Capsule::table('alumnos')->get();  // Trae todos
    //$users = Capsule::table('alumnos')->where('legajo', '>', 457)->get(); //Trae Legajo mayor a 457
    $users = Capsule::table('alumnos')
    ->increment('legajo');
    $response->getBody()->write(json_encode($users));//Muestra la cantidad q modifico
    return $response;

});
//Crea una nueva tabla, base de datos!!
$app->get('/schema', function(Request $request, Response $response){
    $schema= Capsule::schema()->create('users', function ($table) {
        $table->increments('id');
        $table->string('email')->unique();
        $table->timestamps();
    });

    $response->getBody()->write(json_encode($schema));
    return $response;

});

//Guarda un nuevo alumno
//Hace falta agregar estas dos columnas en la base de datos, q agregue de a una.
//updated_at	timestamp		//created_at	timestamp
$app->get('/alumnos', function(Request $request, Response $response){
    $alumno = new Alumno;
    $alumno->nombre="Alvarez Toto";
    $alumno->legajo=999;
    $alumno->localidad_id=1;

    $response->getBody()->write(json_encode($alumno->save()));
    return $response;

});

//trae a todos
$app->get('/todosAlumnos', function(Request $request, Response $response){
    
    $alumno= Alumno::get();
    $response->getBody()->write(json_encode($alumno));
    return $response;

});

//find y modifica
$app->get('/modificar', function(Request $request, Response $response){
    
    $alumno= Alumno::find(1);
    $alumno->nombre="Juancho";
    $response->getBody()->write(json_encode($alumno->save()));
    return $response;

});

//borra
$app->get('/delete', function(Request $request, Response $response){
    
    $alumno= Alumno::find(1);
    $response->getBody()->write(json_encode($alumno->delete()));
    return $response;

});
//ver todo despues de agregar soft delete
$app->get('/ver', function(Request $request, Response $response){
    
    $alumno= Alumno::withTrashed()->get();
    $response->getBody()->write(json_encode($alumno));
    return $response;

});
$app->run();