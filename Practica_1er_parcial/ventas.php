<?php

include_once 'datos.php';

class Ventas{
    public $id;
    public $cantidad;
    public $usuario;
   

    public function __construct($id, $cantidad, $usuario )
    {
        $this->id= $id;
        $this->cantidad= $cantidad;
        $this->usuario= $usuario;
        /* 
            if(validarIdToken($token, $usuario))
        */                
    }

    public function guardarVenta()
    {
        Datos::guardarVenta('ventas.txt', $this);
    }

    public static function leer()
    {
        Datos::leerVentas('ventas.txt');
    }

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
        
    }
}