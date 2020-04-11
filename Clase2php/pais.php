<?php

include 'api.php';

Class Pais extends Rest{

    public $nombre;
    public $paises;
    public $capital;

    public function __construct($nombre) //aca decia $nombre
    {
        parent::__construct();
        //$pais= $this->rest->byName('argentina', true);
        $this->paises= $this->rest->all();
       $this->nombre=$nombre;

        foreach ($this->paises as $buscado)
        {
            if($buscado->name == $nombre)
            {
              //  var_dump($buscado);
                $this->nombre=$buscado->name; 
                $this->capital=$buscado->capital; 

               //var_dump("ESTOY EN EL IF ",$this->nombre);       // Muestra Argentina1
            }
        }

        //foreach($this->nombre as $obj  )
        //{
            //var_dump($obj->capital);
           // $this->capital= $obj->capital;
           // $datos= new infoPais($obj->name,  $obj->capital,  $obj->region);           
        //}
       
    }

    public function Mostrar()
    {
        echo "$this->nombre"; //var_dump($this->capital); con esto me pone string, con hecho no!
    }
}