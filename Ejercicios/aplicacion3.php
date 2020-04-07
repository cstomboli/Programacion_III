<?php

$a=6;
$b=9;
$c=8;


if($a > $b && $a < $c)
{
    echo" El del medio es $a <br>";
}
if($b > $a && $b< $c)
{
    echo" El del medio es $b <br>";
}
if($c > $a && $c< $b)
{
    echo" El del medio es $c <br>";
}
if($a==$b || $a==$c || $b==$c)
{
    echo"No hay valor intermedio";
}

$a=5;
$b=1;
$c=5; //no hay valor del medio.

if($a > $b && $a < $c)
{
    echo" El del medio es $a <br>";
}
if($b > $a && $b< $c)
{
    echo" El del medio es $b <br>";
}
if($c > $a && $c< $b)
{
    echo" El del medio es $c <br>";
}
if($a==$b || $a==$c || $b==$c)
{
    echo"No hay valor intermedio";
}