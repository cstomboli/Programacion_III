<?php

include 'cliente.php';
include 'pizzas.php';
include 'ventas.php';

class Metod{

    public $request_method;
    public $path_info;

    public function __construct($request_method, $path_info){
        $this->request_method=$request_method;
        $this->path_info=$path_info;
        //echo "$path_info";
    }

    public function conexion()
    {
        switch ($this->request_method) 
        {
            case 'POST':
                switch ($this->path_info) 
                {
                    case '/usuario': //1
                        if(isset($_POST['email']) && isset($_POST['clave']) && isset($_POST['tipo']) ) 
                        {
                            $usuario= new Cliente($_POST['email'], $_POST['clave'], $_POST['tipo']);
                            if($usuario->email != null && $usuario->clave != null && $usuario->tipo != null)
                            {
                                $usuario->guardarUsuario(); 
                                echo "Cliente registrado correctamente.";
                            }
                            else{
                                echo "No se puede guardar.";
                            }
                        }                                                
                        break;
                    case '/login': //2
                        if(isset($_POST['email']) && isset($_POST['clave'])) 
                        {
                            if(Cliente::Buscar($_POST['email'], $_POST['clave']))
                            {
                                echo "Ingreso correcto";
                            }
                        }
                        break;
                    
                    case '/pizzas': //3
                        $headers = getallheaders();
                        $mitoken=$headers['token']??'';

                        if(($usuario=Cliente::BuscarAdmin($mitoken)))
                        {                            
                            if(isset($_POST['tipo']) && isset($_POST['precio']) && isset($_POST['stock']) && isset($_POST['sabor']) && isset($_FILES['foto']) ) 
                            {
                                $tmp_name=$_FILES['foto']['tmp_name'];
                                $name=$_FILES['foto']['name'];
                                $nombre=$_POST['sabor'].'-'.$name.'-'.time();
                                $folder= 'imagenes/'; 
                                move_uploaded_file($tmp_name,$folder.$nombre); //la mueve bien, no la muestra!
                                //Producto::crearMarcaDeagua($folder.$nombre,'imagenes/marca_de_agua.jpg');
                                
                                $pizza= new Pizza($_POST['tipo'], $_POST['precio'], $_POST['stock'], $_POST['sabor'],$nombre);
                                //var_dump($pizza);
                                if($pizza->tipo != null && $pizza->sabor != null)
                                {
                                    if(!(Pizza::tipoSabor($pizza->tipo, $pizza->sabor)))
                                    {
                                        $pizza->guardarPizza(); 
                                        echo "Pizza registrada correctamente.";
                                    }
                                    else{
                                        echo "ya existe ese tipo y sabor de pizza";
                                    }
                                    
                                }
                                else{
                                    echo "No se puede guardar.";
                                }
                            }
                            else
                            {
                                echo"else";
                            }
                        }
                        else
                        {
                            echo "No esta autorizado. Solo encargados pueden ingresar pizzas";
                        }                         
                        break;
                    
                    case '/ventas':
                        $headers = getallheaders();
                        $mitoken=$headers['token']??'';

                        if(($usuario=Cliente::BuscarAdmin($mitoken))==false)
                        { 
                            if(isset($_POST['tipo']) && isset($_POST['sabor'])  && isset($_POST['cantidad'])) 
                                {
                                    if($montoVenta=(Pizza::Venta($_POST['tipo'],$_POST['sabor'], $_POST['cantidad'])))
                                    {
                                       // $respuesta=Usuarios::validarIdToken($mitoken, $_POST['ususario']);
                                        echo "El monto de la venta es $montoVenta";
                                        //modifica bien el stock, ver si agregando mas productos, igual anda bien
                                        //guardar en ventas.xxx, serializando!
                                        $mail=Cliente::buscarMail($mitoken);
                                        date_default_timezone_set('UTC');
                                        $fecha = date('l jS \of F Y h:i:s A');
                                        $venta=new Ventas($_POST['tipo'],$_POST['sabor'],$_POST['cantidad'], $montoVenta, $mail, $fecha);
                                        
                                        $venta->guardarVenta();
                                       //$cadena=serialize($venta); esto anda
                                       //echo "$cadena";
                                        
                                    }
                                    
                                }
                        }
                        else
                        {
                            echo "Usted es Admin. Solo puede ingresar Cliente";
                        }

                  
                    
                    
                    default:
                        # code...
                        break;
                }               
                break;
            
            case 'GET':
                switch ($this->path_info) {
                    case '/pizzas':
                        $headers = getallheaders();
                        $mitoken=$headers['token']??'';
                        $usuario=Cliente::BuscarAdmin($mitoken);
                        var_dump(Pizza::mostrar($usuario));                        
                        break;
                    
                    default:
                        # code...
                        break;
                }
                # code...
                break;
        }

    }


}