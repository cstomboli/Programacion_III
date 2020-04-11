<?php

include 'paises.php';

class InfoPais extends Paises{
    
    public $todos;
    public $completo;
    public $nombre;
    public $capital;
    public $region;

    public function __construct($nombre)
    {
        parent::__construct();
        $this->todos= $this->paises;

        foreach ($this->todos as $buscado)
        {

            if($buscado->name == $nombre)
            {
                $this->completo=$buscado;
                $this->nombre=$buscado->name; 
                $this->capital=$buscado->capital; 
                $this->region=$buscado->region; 
            }
        }
    }
    public function Mostrar()
    {
        var_dump($this->completo);
    }

    public function MostrarInfo()
    {
       echo "Pais: $this->nombre <br>Capital: $this->capital <br> Region: $this->region";
    }
}