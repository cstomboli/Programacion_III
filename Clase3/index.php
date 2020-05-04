<?php

include 'persona.php';

$request_method = $_SERVER ['REQUEST_METHOD'];
$path_info = $_SERVER ['PATH_INFO'];
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
                    $persona->Guardar(); // ANDA mal
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
                if(isset($_GET['nombre']) && isset($_GET['apellido']))
                {
                    $persona= new Persona($_GET['nombre'], $_GET['apellido']);
                    echo json_encode($persona); //FUNCIONA
                    $persona->Leer();
                }
                else
                {
                    echo "no hay ninguna persona cargada";
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
        break;
    default:
        echo"Metodo invalido";
        break;
}

$respuesta = new stdClass;

$respuesta -> success = true;
//$respuesta -> datos = $datos;