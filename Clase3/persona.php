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
        //return Datos::guardar('datos.txt', $this->toFile()); //ANda
        return Datos::guardarJson('datos.json', $this); //Anda

    }

    public function Leer(){
        return Datos::leerJson('datos.json');
    }

    public function toFile(){
        return $this->nombre . '@' . $this->apellido . PHP_EOL;  
    }

}