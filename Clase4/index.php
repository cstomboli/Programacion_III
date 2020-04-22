<?php

//Guardar informacion de la sesion// Tercer PARTE.
// composer require firebase/php-jwt instalamos
include 'vendor/autoload.php';
use \Firebase\JWT\JWT;

$key= "example_key";

$payload = array(
    "iss" => "http://example.org"
);

//$jwt= JWT::encode($payload,$key);

//echo "$jwt"; //genero un token

//Cada vez que el cliente haga una peticion, le voy a pedir que me mande en una cabecera
// me va a tener q enviar el token

$headers = getallheaders();
$mitoken=$headers['mi_token']??'';
try{
    $decoded = JWT::decode($mitoken, $key, array('HS256'));
    print_r($decoded);
}
catch(\Throwable $th){
    echo $th->getMessage();
}


die();


/*
/////////// Segunda Parte ///////////// SESSION Y COOKIE

session_start(); // Esto permite, poder trabajar con sesiones. Lo pongo en cada lugar
                //donde quiero acceder a una secion.
//print_r($_SESSION); //Datos de autentificacion

//Escribir cookies

//setcookie("nombres", "Juan", time()-50); //asi se setea, time se borra con el tiempo actual.

$nombre = $_SESSION['nombre'] ??   false;  //Si no existe 

if($nombre == false){
    $_SESSION['nombre']=$_GET['nombre'];
    echo "Sesion guardada";
}
else{
    echo"Hola ". $_SESSION['nombre'];
}

// ifq3frhoe6m8vpbeaos65toklh  EN POSTMAN Cookies, muestra este value.

//session_destroy(); //rompe la cookie, vaciar o romperla

*/
/////////////////// Primera Parte /////////////
/*
include_once "persona.php";

//Guardar datos en archivos. Que podemos guardar, como podemos guardar.

$personas= array();
array_push($personas, new Persona('Pedro'));

print_r($personas);
$file = fopen('persona.txt','r'); 
$rta= fread($file, filesize('persona.txt'));
fclose($file);

//$file = fopen('persona.txt','w'); //modo w escritura, sobreescribe el archivo.
//$rta= fwrite($file, serialize($personas));
//$fclose($file);

$personaDesere= unserialize($rta); 

foreach(){
    echo "$personaDesere.Saludar()";
}

*/