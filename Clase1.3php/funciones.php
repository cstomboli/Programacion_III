<?php

//class Funciones{  Asi funciona! Si le pongo class, no!
class Persona{

    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    function mostrar($name)
    {
        echo "Hola .$this ->name";
    }
    

}