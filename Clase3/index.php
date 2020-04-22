<?php

include 'persona.php';

$request_method = $_SERVER [ 'REQUEST_METHOD' ];
$path_info = $_SERVER [ 'PATH_INFO' ];
$datos;


switch ($request_method) 
{
    case 'POST':
        switch ($path_info) 
        {
            case '/persona':
                if(isset($_POST['nombre']) && isset($_POST['apellido'])) // no entra
                {
                    $persona= new Persona($_POST['nombre'], $_POST['apellido']);
                    echo json_encode($persona);
                    $persona->Guardar();
                }
                else{
                    echo "nop";
                }
                break;
             /*   
            case '/mascota':
                # code...
                break;
            case '/auto':
                # code...
                break; */
            default:
                echo "No";
                break;
        }
        break;
    case 'GET':
        switch ($path_info) 
        {
            case '/persona':
                if(isset($nombre))
                {
                    $persona= new Persona($nombre);
                    echo "$persona";
                }
                break;
                /*
            case 'mascota':
                # code...
                break;
            case '/auto':
                # code...
                break;      */
            default:
                echo "No ";
                break;
        }
    default:
        echo"Metodo invalido";
        break;
}

$respuesta = new stdClass;

$respuesta -> success = true;
//$respuesta -> datos = $datos;