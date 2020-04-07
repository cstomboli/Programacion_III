<?php

require 'funciones.php';

$operador= "+";
$op1 = 10;
$op2= 2;
$res;

switch($operador)
{
    case "+":
        $res=$op1+$op2;
        //echo "Suma $res <br>" ;
        echo "Suma: " .sumar($op1,$op2);
    break;
    case "-":
        $res=$op1+$op2;
        echo "Resta: " .restar($op1,$op2);
    break;
    case "/":
        $res=$op1+$op2;
        echo "Division: " .dividir($op1,$op2);
    break;
    case "*":
        $res=$op1+$op2;
        echo "Multiplicacion: " .multiplicar($op1,$op2);
    break;
}

