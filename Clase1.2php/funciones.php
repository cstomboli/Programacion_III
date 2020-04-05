<?php

require 'saludar.php';

function saludarEspanol($nombre)
{
    $persona = new Persona(' Juan ');
    echo $persona ->saludar();
}