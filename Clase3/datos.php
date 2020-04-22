<?php

class Datos{

    public static function guardar($archivo, $datos)
    {
        $pFile = fopen($ruta, 'a');

        $rta = fwrite($pfile, $datos);
        
        fclose($pfile);

    }

    public static function guardarJson($archivo, $datos)
    {
        $pFile = fopen($archivo, 'a');
        $string=json_encode($pFile);

        $stringJson =json_decode($string);
        fclose
        $rta = fwrite($datos, $string);
        
        fclose($pFile);

    }

    public static function Leer($archivo)
    {
        $pFile = fopen($ruta, 'r');
        $lista= array();

        while(feof($pFile))
        {
            $linea=fgets($pfile);
            $explode=explode('@', $linea); // '@' o lo que sea que separe
            if(count($explode)>1)
            {
                array_push($lista, $explode);
            }
        }
        fclose($pFile);
        return $lista;
    }

    public static function LeerJson($archivo)
    {
        $pFile = fopen($ruta, 'r');
        $lista= array();

        while(feof($pFile))
        {
            $linea=fgets($pfile);
            $explode=explode('@', $linea); // '@' o lo que sea que separe
            if(count($explode)>1)
            {
                array_push($lista, $explode);
            }
        }
        fclose($pFile);
        return $lista;
    }
}



//echo  json_encode ($respuesta);