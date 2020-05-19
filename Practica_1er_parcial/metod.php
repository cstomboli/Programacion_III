<?php

include_once 'usuarios.php';
include_once 'producto.php';
include_once 'ventas.php';

class Metod{ 

    public $request_method;
    public $path_info;

    public function __construct($request_method, $path_info)
    {
        $this->request_method= $request_method;
        //echo"$request_method";
        $this->path_info= $path_info;
    }

    public function Conexion()
    {
        switch ($this->request_method) 
        {
            case 'POST':
                switch ($this->path_info) 
                {
                    case '/usuario':
                        //echo "Usuario";
                        if(isset($_POST['nombre']) && isset($_POST['dni']) && isset($_POST['obra_social']) && isset($_POST['clave'])  && isset($_POST['tipo'])) 
                        {
                            $usuario= new Usuarios($_POST['nombre'], $_POST['dni'], $_POST['obra_social'], $_POST['clave'], $_POST['tipo'],null);
                            $usuario->GuardarUsuario(); 
                            //var_dump($usuario);
                            echo "Usuario creado correctamente.";
                        }
                        else{
                            echo "nop";
                        }
                        break;
                        
                    case '/login': 
                        if(isset($_POST['nombre']) && isset($_POST['clave'])) 
                        {
                            if(Usuarios::Buscar($_POST['nombre'], $_POST['clave']))
                            {
                                echo "Ingreso correcto";
                            }
                        }
                        break;

                    case '/stock':
                        $headers = getallheaders();
                        $mitoken=$headers['token']??'';

                        if(($usuario=Usuarios::BuscarAdmin($mitoken)))
                        {
                            if(isset($_POST['producto']) && isset($_POST['marca']) && isset($_POST['precio']) && isset($_POST['stock'])  && isset($_FILES['foto'])) 
                            {
                                move_uploaded_file($_FILES['foto']['tmp_name'], 'imagenes/'.$_FILES['foto']['name']);
                                Producto::crearMarcaDeagua('imagenes/'.$_FILES['foto']['name'],'imagenes/' .$_FILES['foto']['name'] . 'marca_de_agua.jpg');


                                //$tmp_name=$_FILES['foto']['tmp_name'];
                                //$name=$_FILES['foto']['name'];
                                //$nombre=$_POST['marca'].'-'.$name.'-'.time();
                                $producto= new Producto($_POST['producto'], $_POST['marca'], $_POST['precio'], $_POST['stock'], $_FILES['foto']['name'], null);
                                $producto->GuardarProducto(); 
                                //$folder= 'imagenes/'; 
                                //move_uploaded_file($tmp_name,$folder.$nombre); //la mueve bien, no la muestra!
                                //Producto::crearMarcaDeagua($folder.$nombre,'imagenes/marca_de_agua.jpg');
                                //var_dump($producto);
                                echo "Producto creado correctamente.";
                            }
                            else
                            {
                                echo "no entra";
                            }
                        }                       
                        else
                        {
                            echo "No esta autorizado. Solo administradores pueden acceder al Stock";
                        } 
                        break;

                    case '/ventas':
                        $headers = getallheaders();
                        $mitoken=$headers['token']??'';

                        //if(Usuarios::validarIdToken($mitoken, $_POST['ususario']))// no anda
                        //{
                            if(($usuario=Usuarios::BuscarAdmin($mitoken))==false)
                            {
                                if(isset($_POST['id_producto']) && isset($_POST['cantidad']) && isset($_POST['ususario'])) 
                                {
                                    if($montoVenta=(Producto::Venta($_POST['id_producto'],$_POST['cantidad'],$_POST['ususario'])))
                                    {
                                       // $respuesta=Usuarios::validarIdToken($mitoken, $_POST['ususario']);
                                        echo "El monto de la venta es $montoVenta";
                                        //modifica bien el stock, ver si agregando mas productos, igual anda bien
                                        //guardar en ventas.xxx, serializando!
                                        $venta=new Ventas($_POST['id_producto'],$_POST['cantidad'],$_POST['ususario']);
                                        $venta->guardarVenta();
                                       //$cadena=serialize($venta); esto anda
                                       //echo "$cadena";
                                        
                                    }
                                    
                                }
                            }
                            else{
                                echo"Solo usuarios pueden vender, Usted es admin";
                            }
                        //}                       
                        break;
                }
            break;
            case 'GET':
                switch ($this->path_info) 
                {
                    case '/stock':
                        var_dump(Producto::LeerProducto()); //ver si agrego mas, los lee a todos.
                    break;
                                            
                    case '/ventas':
                        $headers = getallheaders();
                        $mitoken=$headers['token']??'';
                        
                        if($usuario=Usuarios::BuscarAdmin($mitoken))
                        {
                            echo "entra"; //Entra!
                           var_dump(Ventas::leer());
                           //var_dump($ventas);                            
                        }
                        elseif(($usuario=Usuarios::BuscarAdmin($mitoken))==false)
                        {
                            echo "venta usuarui";
                            Ventas::ventasUsuario($mitoken);
                        }
                    break;
                }
                break;
            default:
                echo"Metodo invalido";
                break;
        }
        $respuesta = new stdClass;
        $respuesta -> success = true;
        //$respuesta -> datos = $datos;
    }
}