<?php

//include 'datos.php'; no hace falta incluir, porque el metodo q uso
                    // es estatico.

/*Clase creada, para el uso de funciones comunes en las dos clases.*/

class Funciones{
    
    public static function GenerarId($archivo)
    {
        $array = Datos::leerJson($archivo);
        
        if(!isset($array))
        {
            $retorno=1;
        }
        else
        {
            $retorno=count($array)+1;
        }
        return $retorno;
    }
}