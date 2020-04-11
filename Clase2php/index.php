<?php

require_once __DIR__ .'/vendor/autoload.php';
include 'infoPais.php';
include 'miPais.php';

$todosLosPaises= new Paises(); 
$informacionPorPais=new infoPais("Chile");  //Argentina// Puede indicar el pais que quiera, para ver las caracteristicas.

/*
**  Descomente la opcion que desea ver!!
*/
//$todosLosPaises->Mostrar();               //Muestra todos los paises.
$informacionPorPais->Mostrar();             // Muestra todo la informacion del pais indicado.
//$informacionPorPais->MostrarInfo();       // Muestra informacion mas detallada del pais indicado.
//echo miPais::MetodoEstatico();            //Muestra mi pais de origen.