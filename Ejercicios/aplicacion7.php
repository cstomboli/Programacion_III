<?php

$curso = array();
$contador=1;

for($indice = 0; $indice<10; $indice++)
{
    $curso[$indice] = $contador;
    $contador=$contador +2;
}

for($indice = 0; $indice<10; $indice++)
{
    //echo '<pre>', var_dump($curso[$indice]), '<pre>'; //Funciona cualquiera de los dos.
    echo "$curso[$indice]<br>";

}

