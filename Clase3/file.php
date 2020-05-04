<?php

var_dump($_FILES['archivo']);
$tmp_name=$_FILES['archivo']['tmp_name'];
$name=$_FILES['archivo']['name'];
$nombre=$_POST['legajo'].'-'.$name.'-'.time(); //concatenar cosas para el nombre
$folder= 'imagenes/';

move_uploaded_file($tmp_name,$folder.$nombre);

//Esto guarda!!