<?php

echo "Hoy es " . date("Y/m/d") . "<br>";

echo "El dia es " . date("l") . " <br>"; 
$estacion= (int)date("m");
$dia = date("d");
//echo "estac $estacion dia $dia<br>";

if(($estacion == 03 && $dia > 20) || ($estacion == 06 && $dia<21 ) && ($estacion >= 03 && $estacion <= 06))
{
    echo"Es aca<br>";
}


switch ($estacion) 
{
    case "01":  
    case "02":
    case "03":
        if($estacion==03 && $dia > 20)
        {
            echo"Es otoño ";
        }
        else
        {
            echo"es vernao";
        }             
    break;

    case "04":  
    case "05":
    case "06":
        if($estacion==06 && $dia > 20)
        {
            echo"Es Invierno ";
        } 
        else 
        {
            echo"Es otoño ";
        } 
    break;
  
    case "07":
    case "08":
    case "09":
        if($estacion==06 && $dia > 20)
        {
            echo"Es Primavera ";
        } 
        else 
        {
            echo"Es Invierno ";
        }       
    break;

    case "10":
    case "11":
    case "12":
        if($estacion==12 && $dia > 20)
        {
            echo"Es verano ";
        } 
        else 
        {
            echo"Es primavera ";
        }       
        break;
}