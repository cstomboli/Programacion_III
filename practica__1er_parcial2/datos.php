<?php

class Datos{

    public static function guardarJson($archivo, $datos)
    {
        $stringJson= Datos::LeerJson($archivo); 
        if($stringJson==null)
        {
            $stringJson=array();
        }
        array_push($stringJson,$datos); //esto agrega al final de lo q hay 
        $pFile = fopen($archivo, 'w'); //o a+ funciona mal Con 'w' borra el q esta
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
    }

    public static function guardarVenta($archivo, $datos) //anda
    {
        $array=Datos::LeerVentas($archivo);
        if(!is_null($array))
        {
            $array=array();
        }
        array_push($array,$datos); 
        $pfile=fopen($archivo, 'a+'); 
        $cadena=serialize($datos);        
        $rta=fwrite($pfile,$cadena.PHP_EOL);
        return $rta;
    }

    public static function leerVentas($archivo)
    {
        $response = false;
        if(file_exists($archivo)){
            $pFile = fopen($archivo,'r');
            if(!is_null($pFile)){
                $response = array();
                while(!feof($pFile)){
                    array_push($response,unserialize(fgets($pFile)));
                }           
                fclose($pFile);
                array_pop($response);
           }
        }
        return $response;      
    }

    
    public static function modificarJson($archivo, $tipo, $sabor, $cantidad)
    {
        $array= Datos::LeerJson($archivo); 
        $pFile = fopen($archivo, 'w');
        
        foreach($array as $value)
        {
            if($value->tipo == $tipo)
            {
                if($value->sabor == $sabor)
                {
                    if($value->stock!=$cantidad)
                    {
                        $value->stock=$cantidad;
                        array_push($array);
                        $rta = fwrite($pFile, json_encode($array));
                        break;  
                    }  
                }                     
            }
        }
        fclose($pFile);
        return $rta;       
    }
}