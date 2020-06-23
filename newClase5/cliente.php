<?php

include 'datos.php';
use \Firebase\JWT\JWT;

class Cliente{

    public $email;
    public $clave;
    public $tipo;

    public function __construct($email, $clave, $tipo){
       
        $this->email=$email;
        $this->clave=$clave;
        $this->tipo=$tipo;

        if($tipo == 'encargado' || $tipo== 'cliente')
        {
            $this->tipo=$tipo;
        }
        else{
            $this->tipo=null;            
            echo "Tipo incorrecto.  ";
        }
    }

    public function guardarUsuario(){
        
        if($this->tipo != null)
        {
            return Datos::guardarJson('clientes.json', $this);
        }
        else{
            echo "El usuario no se guardara.";
        }
    }
    
    public static function Buscar($email, $clave)
    {
        $array = Datos::leerJson('clientes.json');
        $retorno= false;

        foreach($array as $value)
        {
            if($value->email == $email)
            {
                if($value->clave ==$clave)
                {
                    $retorno=true;
                    
                    $key= "pro3-parcial";
                    $payload = array(
                        "email" => $email,
                        "clave" => $clave,                    
                        "tipo"=>$value->tipo
                    );
                    $jwt= JWT::encode($payload,$key);
                    echo "$jwt"; 
                    //var_dump($payload);
                    break; 
                }                
            }
        }
        return $retorno;
    }

    public static function BuscarAdmin($token)
    {
        $retorno=false;
        $key= "pro3-parcial";
        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
            if($decoded->tipo == 'encargado')
            {
                $retorno=true; 
            }
        }
        catch(Exception $e){
            echo "Token no valido -> ". $e->getMessage();
        }
        return $retorno;
    }

    public static function BuscarMail($token)
    {
        $retorno="";
        $key= "pro3-parcial";
        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
            $retorno=$decoded->email;
        }
        catch(Exception $e){
            echo "Token no valido -> ". $e->getMessage();
        }
        return $retorno;
    }


}