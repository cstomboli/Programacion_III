<?php

include 'pais.php';

class InfoPais extends Pais{
    
    public $name;
    public $capital;
    public $region;

    public function __construct($name)
    {
        parent::__construct($name);
        
        $this->name= $this->paises->name;
        //echo"nombre$name";
        //var_dump($this->name);
        foreach ($this->paises as $buscado)
        {
            if($buscado->name == $nombre)
            {
              //  var_dump($buscado);
                //$this->nombre=$buscado->name; 
                //$this->capital=$buscado->capital; 

               //var_dump("ESTOY EN EL IF ",$this->nombre);       // Muestra Argentina1
            }
        }



        $this->name = $name;
        $this->capital =$capital;
        $this->region=$region;
    }
    public function Mostrar()
    {
        echo"Nombre: $name, capital: $capital";
    }
}