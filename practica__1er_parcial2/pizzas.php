<?php

class Pizza{

    public $tipo;
    public $precio;
    public $stock;
    public $sabor;
    public $foto;

    public function __construct($tipo, $precio, $stock, $sabor,$foto){
        //$this->tipo=$tipo; //(piedra, molde)
        $this->precio=$precio;
        $this->stock=$stock;
        //$this->sabor=$sabor; //(jamon, muzza, napo, )
        $this->foto=$foto;

        if($tipo == 'piedra' || $tipo== 'molde')
        {
            $this->tipo=$tipo;            
        }
        else{
            $this->tipo=null;
            echo "Tipo incorrecto.  ";
        }

        if($sabor == 'jamon' || $sabor == 'muzza' || $sabor == 'napo')
        {
            $this->sabor=$sabor;            
        }
        else{
            echo "$sabor";
            $this->sabor=null;
            echo "Sabor incorrecto.  ";
        }
    }

    public function guardarPizza()
    {
        return Datos::guardarJson('pizzas.json', $this); 
    }

    public function leerPizza()
    {
        return Datos::leerJson('pizzas.json');
    }

    public static function tipoSabor($tipo, $sabor)
    {
        $array = Datos::leerJson('pizzas.json');
        $retorno = false;
        //echo "$array";
        if($array!=null)
        {
            foreach($array as $value)
            {
                if($value->tipo == $tipo)
                {
                    if($value->sabor == $sabor)
                    {
                        $retorno = true; //ya existe tipo y sabor
                    }
                }
            }
        }        
        return $retorno;
    }

    public static function mostrar($bool)
    {
        $array = Datos::leerJson('pizzas.json');
        if($bool==true)
        {
            $retorno = $array;
        }
        else
        {
            foreach($array as $value) 
            {
                $retorno =  array("Tipo: " => "$value->tipo", "Precio: "=> "$value->precio", "Sabor: "=> "$value->sabor",  "Foto: "=> "$value->foto");

               //$retorno =  $value->tipo . $value->precio .  $value->sabor . $value->foto;
            }
        }
        return $retorno;
    }

    
    public static function Venta($tipo, $sabor, $cantidad)
    {
        $array = Datos::leerJson('pizzas.json');
        $retorno= 0;

        if(Pizza::tipoSabor($tipo, $sabor)==true)
        {
            foreach($array as $value)
            {
                if($value->tipo == $tipo)
                {    
                    if($value->sabor>=$sabor) 
                    {
                        if($value->stock>=$cantidad)
                        {
                            $retorno = $value->precio * $cantidad;
                            $nuevaCantidad = $value->stock-$cantidad;
                            Datos::modificarJson('pizzas.json', $tipo, $sabor, $nuevaCantidad );
                            //Cliente::
                        }
                        else
                        {
                            echo " No se puede realizar la venta, porque hay $value->stock y quiere vender $cantidad";
                        }                      
                    }                    
                }
            }
        }        
        return $retorno;
    }


}