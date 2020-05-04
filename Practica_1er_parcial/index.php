<?php

include 'vendor/autoload.php';
include_once 'metod.php';

$metod= new Metod($_SERVER ['REQUEST_METHOD'], $_SERVER ['PATH_INFO']);
$metod->Conexion();

/*
//echo json_encode($_SERVER);
$request_method= $_SERVER['REQUEST_METHOD'];
$path_info= $_SERVER['PATH_INFO'];
//echo json_encode($request_method);
var_dump($request_method); 
var_dump($path_info);  */