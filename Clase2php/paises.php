<?php

include 'api.php';
include 'interface.php';

Class Paises extends Rest implements IInterface{

    public $nombre;
    public $paises;
    public $capital;

    public function __construct() //aca decia $nombre
    {
        parent::__construct();
        $this->paises= $this->rest->all();
    }

    public function Mostrar()
    {
        var_dump($this->paises); //muestro todos!!
        //echo "$this->paises"; //var_dump($this->capital); con esto me pone string, con hecho no!
    }
}