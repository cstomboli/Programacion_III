<?php

require_once __DIR__ .'/vendor/autoload.php';


use  NNV \ RestCountries ;

class Rest{

    protected $rest;

    public function __construct(){
        $this->rest= new RestCounties;
    }
}

Class Pais extends Rest{
    

    public function __construct()
    {
        parent::__construct();
        $pais= $this->rest->byName('argentina', true);
        var_dump($pais);
    }
}

$pais= new Pais();