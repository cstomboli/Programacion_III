<?php

include 'vendor/autoload.php';
include 'metod.php';

$conecto=new Metod($_SERVER ['REQUEST_METHOD'], $_SERVER ['PATH_INFO']);
$conecto->conexion();
//var_dump($conecto);
//aca voy a llamar al switch del metod;