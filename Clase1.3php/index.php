<?php

require 'funciones.php';

$persona = new Persona("tita");

//echo "Hola $persona<br>"; // no puedo mostrar un Objeto.
//mostrar($persona);           //Asi tampoco anda
$persona ->mostrar($persona);