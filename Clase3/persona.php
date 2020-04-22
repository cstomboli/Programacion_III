<?php

include 'datos.php';

class Persona{

    public $nombre;
    public $apellido;
    
    public function __construct($nombre, $apellido){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }

    public function Guardar(){
        return Datos::guardarJson('datos.json', $this);
    }

    public function Leer(){
        return Datos::leerJson('datos.json');
    }

}