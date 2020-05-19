<?php

class Ventas{

    public $tipo;
    public $sabor;
    public $cantidad;
    public $monto;
    public $mail;
    public $fecha;

    public function __construct($tipo, $sabor, $cantidad, $monto, $mail, $fecha)
    {
        $this->tipo=$tipo;
        $this->sabor=$sabor;
        $this->cantidad=$cantidad;
        $this->monto=$monto;
        $this->mail=$mail;
        $this->fecha=$fecha;

    }
    
    public function guardarVenta()
    {
        return Datos::guardarJson('ventas.txt', $this); 
    }

    public static function leer()
    {
       return Datos::leerVentas('ventas.txt');
    }

    /*
    public static function ventasUsuario($token)
    {
        $array = Datos::LeerVentas('ventas.txt');
        //$array=array();
        $responde= null;
        echo"este";
        foreach($array as $value)
        {
            echo "entra $value->nombre";
            if(Usuarios::validarIdToken($token, $value->nombre)==true)
            {
                echo"aca";
            }
        }        
    }*/
}