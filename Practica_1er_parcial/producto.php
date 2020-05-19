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

    public static function crearMarcaDeagua($imagenOriginal, $marcaDeAgua)
    {
        // Cargar la estampa y la foto para aplicarle la marca de agua
        $im = imagecreatefromjpeg($imagenOriginal);
       // $marcaDeAgua = imagecreatefromjpeg('marca_de_agua.jpeg');

        // Primero crearemos nuestra imagen de la estampa manualmente desde GD
        $estampa = imagecreatetruecolor(100, 70);
        imagefilledrectangle($estampa, 0, 0, 99, 69, 0x0000FF);
        imagefilledrectangle($estampa, 9, 9, 90, 60, 0xFFFFFF);
        $im = imagecreatefromjpeg($imagenOriginal);
        imagestring($estampa, 5, 20, 20, 'cstomboli', 0x0000FF);
        imagestring($estampa, 3, 20, 40, '2020', 0x0000FF);

        // Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
        $margen_dcho = 10;
        $margen_inf = 10;
        $sx = imagesx($estampa);
        $sy = imagesy($estampa);

        // Fusionar la estampa con nuestra foto con una opacidad del 50%
        imagecopymerge($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa), 50);

        // Guardar la imagen en un archivo y liberar memoria
        imagepng($im, $marcaDeAgua);
        imagedestroy($im);        
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