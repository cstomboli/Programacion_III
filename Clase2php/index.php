<?php

require_once __DIR__ .'/vendor/autoload.php';
//include 'infoPais.php';
include 'pais.php';

$pais= new Pais("Argentina");
//$info=new infoPais("Argentina");

//$info->Mostrar();
$pais->Mostrar();