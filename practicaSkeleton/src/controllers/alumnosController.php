<?php
namespace App\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\models\Alumno;
use App\models\Datos;

class AlumnosController 
{
    function getAll(Request $request, Response $response, $args){
       
       $rta = json_encode(Alumno::all());
       // $users = Capsule::table('alumnos')->get();  // Trae todos
        //$users = Capsule::table('alumnos')->where('legajo', '>', 457)->get(); //Trae Legajo mayor a 457
        //$users = Capsule::table('alumnos')
        //->where('legajo', '>', 457)
        //->get();
        Datos::guardarJson('datos.json', $rta);
        $response->getBody()->write($rta);//("Hello Tita");
       // $response->getBody()->write(json_encode($users));//("Hello Tita");
        return $response;    
    }


}