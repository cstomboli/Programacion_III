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

    public static function guardarVenta($archivo, $datos)
    {
        $pfile=fopen($archivo, 'a+');
        $cadena=serialize($datos);        
        $rta=fwrite($pfile,$cadena.PHP_EOL);
        return $rta;
    }

    public static function LeerVentas($archivo)
    {
        $file = fopen($archivo,'r');
        while(!feof($file)){

            $linea = unserialize(fgets($file));                    
        } 
        //array_push($stringJson,$datos); //esto agrega al final de lo q hay 
        $rta = $linea;  //convierto el objetos a JSON con json_encode      
        fclose($file);
        return $rta;
        /*
        
       
        $cadena=unserialize($file); 
        var_dump($cadena);   
       /*
        $rta = '';    
               
        return $rta; /*

        $pfile=fopen($archivo, 'r');
        $cadena=unserialize($archivo);        
        $rta=fgets($pfile,$cadena);
        return $rta; */
    }

    public static function modificarJson($archivo,$id, $cantidad)
    {
        $array= Datos::LeerJson($archivo); 
        $pFile = fopen($archivo, 'w');
        
        foreach($array as $value)
        {
            if($value->id == $id)
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

    public static function Leer($archivo)
    {
        $pFile = fopen($archivo, 'ab');
        $lista= array();

        while(!feof($pFile))
        {
            $linea=fgets($pfile);
            $explode=explode('@', $linea); 
            if(count($explode)>1)
            {
                array_push($lista, $explode);
            }
        }
        fclose($pFile);
        return $lista;
    }
}


