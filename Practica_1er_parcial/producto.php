<?php

include 'funciones.php';
include 'datos.php';

class Producto{

    public $producto;
    public $precio;
    public $stock;
    public $foto;

    public function __construct( $producto, $marca, $precio, $stock, $foto, $id){
       
        $this->producto=$producto;
        $this->marca= $marca;
        $this->precio=$precio;
        $this->stock=$stock;
        $this->foto=$foto;
        if($id==null)
        {
            $this->id =Funciones::GenerarId('productos.json');
        }
    }

    public function GuardarProducto()
    {
        return Datos::guardarJson('productos.json', $this); //.GenerarId()); 
    }

    public function LeerProducto()
    {
        return Datos::leerJson('productos.json');
    }

    public static function Venta($id, $cantidad, $usuario)
    {
        $array = Datos::leerJson('productos.json');
        $retorno= 0;

        foreach($array as $value)
        {
            if($value->id == $id)
            {    
                if($value->stock>=$cantidad) 
                {
                    $retorno = $value->precio * $cantidad;
                    $nuevaCantidad = $value->stock-$cantidad;
                    Datos::modificarJson('productos.json',$id, $nuevaCantidad );
                    echo "realizo la venta $usuario"; //tendria q validar q el usuario y el tokne coincidan.
                    //$array=array($usuario, $value->id, $cantidad);
                    //$cadena=serialize($array);
                    //echo"$cadena";

                }
                else
                {
                    echo " No se puede realizar la venta, porque hay $value->stock y quiere vender $cantidad";
                }
            }
        }
        return $retorno;
    }

    




}