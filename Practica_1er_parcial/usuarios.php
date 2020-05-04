<?php

//include 'datos.php';
//include 'funciones.php';
use \Firebase\JWT\JWT;

class Usuarios{

    public $id;    
    public $nombre;
    public $dni;
    public $obra_social;
    public $clave;
    public $tipo;

    public function __construct($nombre, $dni, $obra_social, $clave ,$tipo,$id )
    {
        $this->clave= $clave;
        $this->nombre= $nombre;
        $this->dni= $dni;
        $this->obra_social= $obra_social; 
        $this->tipo = $tipo; 
        if($id==null)
        {
            $this->id =Funciones::GenerarId('datos.json');
        }        
    }
    
    public function GuardarUsuario()
    {
        return Datos::guardarJson('datos.json', $this); //.GenerarId()); 
    }

    public function Leer()
    {
        return Datos::leerJson('datos.json');
    }

    public static function Buscar($nombre, $clave)
    {
        $array = Datos::leerJson('datos.json');
        $retorno= false;

        foreach($array as $value)
        {
            if($value->nombre == $nombre)
            {
                if($value->clave ==$clave)
                {
                    $retorno=true;
                    
                    $key= "example_key";
                    $payload = array(
                        "email" => $nombre,
                        "clave" => $clave,
                        "nombre"=>$value->dni,
                        "apellido"=>$value->obra_social,
                        "telefono"=>$value->id,
                        "tipo"=>$value->tipo
                    );
                    $jwt= JWT::encode($payload,$key);
                    echo "$jwt"; 
                    //var_dump($payload);
                    break; 
                }
                
            }
            //si pongo usuario incorrecto aca cada vez q itera           
        }
        return $retorno;
    }

    public static function BuscarAdmin($token)
    {
        $retorno=false;
        $key= "example_key";
        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
            if($decoded->tipo == 'admin')
            {
                $retorno=true; 
            }
        }
        catch(Exception $e){
            echo "Token no valido -> ". $e->getMessage();
        }
        return $retorno;
    }

    public static function BuscarToken($token)
    {
        $key= "example_key";
        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
           /* $retorno=array("Mail"=>$decoded->email, "Clave"=>$decoded->clave, "Nombre"=>$decoded->nombre, 
            "Apellido"=>$decoded->apellido, "Telefono"=>$decoded->telefono, "Tipo"=>$decoded->tipo);*/

            echo "Mail: ". $decoded->email . PHP_EOL . "Clave: " .$decoded->clave . PHP_EOL . "Nombre: ". $decoded->nombre 
            . PHP_EOL . "Apellido: " . $decoded->apellido . PHP_EOL . "Telefono: ". $decoded->telefono . PHP_EOL . "Tipo: ".$decoded->tipo;
        }
        catch(Exception $e){
            echo "Token no valido -> ". $e->getMessage();
        }
    }

    public static function BuscarTipo($tipo)
    {
        $array = Datos::leerJson('datos.json');
        $responde= null;

        foreach($array as $value)
        {
            if($value->tipo == $tipo && $tipo== 'admin')
            {
                echo "Usuario: " . $value->nombre . PHP_EOL . "Tipo: " . $value->tipo . PHP_EOL;
                $responde=true;
            }
            elseif($value->tipo == $tipo && $tipo== 'user')            
            {
                echo "Usuario: " . $value->nombre . PHP_EOL . "Tipo: " . $value->tipo . PHP_EOL;
                $responde=false;
            }
        }
        return $responde;        
    }

}