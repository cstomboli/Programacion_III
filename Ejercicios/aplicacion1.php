<?php

$numero = 0;
$suma=0;

while($suma<1000 && $numero<45)
{
    $suma += $numero; 
    $numero++;
}

echo"<br>El numero es $numero . y la Suma $suma";
