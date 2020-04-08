<?php

include 'api.php';

Class Pais extends Rest{

    public $name;
    public $capital;

    public function __construct()
    {
        parent::__construct();
        $pais= $this->rest->byName('argentina', true);
       // $name=$this->$pais["name"];
        $name=$this->$pais["name"];       

        //$nombrePais= json_encode($pais->fields(["name"])->byName("Argentina"));
        //$nombre= (json_decode($nombrePais))[0]->name;

        //echo "Muestro $name"; //Hasta aca muestra Argentina.
        //$name=$this->$nombre;

        var_dump($name);
    }
}