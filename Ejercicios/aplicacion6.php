<?php

//$array= array();

//$array =array_rand()

$curso = array();
$acumulador=0;
$promedio=0;

for($contador = 0; $contador<6; $contador++)
{
    $curso[$contador] = mt_rand(0,5);
    $acumulador += (int)$curso[$contador];
}
var_dump($curso[0]);
var_dump($curso[1]);
var_dump($curso[2]);
var_dump($curso[3]);
var_dump($curso[4]);
var_dump($curso[5]);
$promedio= $acumulador/$contador;
echo"acumulador $acumulador <br>";
echo"Promedio $promedio <br>";


if($promedio>6)
{
    echo"El promedio es mayor a 6";
}
elseif($promedio<6)
{
    echo"El promedio es menor a 6";
}
else
{
    echo " El promedio es igual a 6";
}