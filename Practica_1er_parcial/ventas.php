<?php

class ventas{
    public $id;
    public $cantidad;
    public $usuario;
    public $tipo;

    public function __construct($id, $cantidad, $usuario )
    {
        $this->id= $id;
        $this->cantidad= $cantidad;
        $this->usuario= $usuario; 
               
    }

    public function guardarVenta()
    {
        Datos::guardarVenta('ventas.txt', $this);
    }

    public static function leerVentas()
    {
        Datos::leerVentas('ventas.txt');
    }
}