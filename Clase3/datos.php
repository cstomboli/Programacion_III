<?php

class Datos{

    public static function guardar($archivo, $datos)
    {
        $pFile = fopen($archivo, 'a');

        $rta = fwrite($pFile, $datos);
        
        fclose($pFile);
        return $rta;
    }

    public static function guardarJson($archivo, $datos)
    {
        //$pFile = fopen($archivo, 'a');
        $stringJson= Datos::LeerJson($archivo); //Guarda literal []
        if($stringJson==null)
        {
            $stringJson=array();
        }
        array_push($stringJson,$datos);
        //fclose($pFile);
        $pFile = fopen($archivo, 'w'); //o a+ funciona mal Con 'w' borra el q esta
        //$stringJson =json_decode($string);         
        $rta = fwrite($pFile, json_encode($stringJson));  //convierto el objetos a JSON con json_encode      
        fclose($pFile);
        return $rta;
    }

    public static function LeerJson($archivo)
    {
        
        $file = fopen($archivo,'r');
        $rta = '';    
        while(!feof($file)){
            $linea = json_decode(fgets($file));
            if($rta==''){
                $rta = $linea;
            }else{
                $rta = $rta.' '.$linea;
            }        
        }        
        return $rta;

        /*
        $file = fopen($archivo, 'r');

        $arrayString = fread($file, filesize($archivo));

        $arrayJSON = json_decode($arrayString);

        fclose($file);

        return $arrayJSON;
        
        ////////
        $retorno=false;
        $pFile = fopen($archivo, 'r'); //tira error si no esta creado, como controlo?
        if($pFile!=null)
        {
            $lista= array();
            while(!feof($pFile)) //con ! loop
            {
                $linea=json_decode(fgets($pfile));  //De JSON a una variable de PHP.
                $explode=explode(',', $linea);      // '@' o lo que sea que separe
                if(count($explode)>1)
                {
                    array_push($lista, $explode);
                    $retorno=$lista;
                }
            }
            fclose($pFile);
        }
        else{
            echo"No hay archivo";
        }
        
        return $retorno;
        */
    }

    public static function Leer($archivo)
    {
        $pFile = fopen($archivo, 'ab');
        $lista= array();

        while(!feof($pFile))
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



