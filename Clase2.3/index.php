<?php

//echo "Clase 2.3";

//Variable super global siempre empieza con $_ y en Mayuscula.

////////////////////////// AHORA PETISION GET

// La variable Super Global GET es un array.

//var_dump($_GET);
//echo $_GET['nombre'];

//Para convertir un array get a Json. NOSOTROS DEVOLVEMOS EN JSON.

//echo json_encode($_GET);
//echo json_encode(array('respuesta'=>false));

/*
$respuesta = new stdClass;
$respuesta->respuesta=true;
$respuesta->data="Mario";

echo json_encode($respuesta);
*/

////////////////////////// PETISION POST
//Los datos se envian por Body de (Postman)

//var_dump($_GET);    //NO muestra nada, porque estoyu yendo po el metodo Post, no get!
//$respuesta = new stdClass;

//echo json_encode($_POST);

//echo json_encode($REQUEST); //Obtengo las peticiones de GET Y POST

//Por get me van mandan id

//$id= $_GET['id']??0; // esto hace lo mismo q -> hace lo mismo q el isset, se fija que exista
                                                // el id y es diferente de nulo
//echo $id;
/*
$id;

if(isset($_GET['id'])) // esto
{
    echo "Metodo get". $_GET['id'];
}
else
{
    echo "POST";
}*/
//Por post me van a mandar id.
//echo json_encode($_SERVER);
$request_method= $_SERVER['REQUEST_METHOD'];
$path_info= $_SERVER['PATH_INFO'];
$datos;

switch ($path_info) {   //hacer esto con funciones
    case '/mascota':
        if($request_method== 'POST')
        {
                //guardo datos
        }
        else if ($request_method == 'GET')
        {
                //devuelvo datos
                $datos= array('Mishi','bartolito', 'Nemo');
        }
        else
        {
            echo "405 methos not allowed";
        }
        break;

    case '/personas':
        if($request_method== 'POST')
        {

        }
        else if ($request_method == 'GET')
        {
            $datos= array('Juan','Maria', 'Pedro');

        }
        else
        {
            echo "405 methos not allowed";
        }
        break;
    case '/autos':
        if($request_method== 'POST')
        {

        }
        else if ($request_method == 'GET')
        {
            $datos= array('Ford','Fiat', 'audi');

        }
        else
        {
            echo "405 methos not allowed";
        }
    break;
    default:
        # code...
        break;
}

$respuesta = new stdClass;

$respuesta->success=true;
$respuesta->data=$datos;

echo json_encode($respuesta);




