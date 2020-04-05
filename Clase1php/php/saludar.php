<?php

class Persona{
    public $nombre;

    public function __construct($nombre)
    {
        $this->nombre=$nombre;
    }
    function saludar() 
    {
        echo "Hola ".$this->nombre;        
    }
}

/*
function saludar($nombre="NN") // si tengo otro parametro tmb va a tener q ser por default.
    {
        echo("Hola $nombre");        
    }
*/
?>