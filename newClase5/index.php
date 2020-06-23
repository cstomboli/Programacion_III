<?php


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//use Slim\Exception\NotFoundException;

require __DIR__ . '/vendor/autoload.php';
include 'cliente.php';
include 'pizzas.php';


$app = AppFactory::create();
$app-> setBasePath('/Programacion_III/newClase5');
$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true); //muestra errores

$app->post('/usuario', function (Request $request, Response $response, $args) {
    
    $body= $request->getParsedBody(); //ver si anda
    $rta= array("succes"=> true, "data"=> "POST", "body"=>$body);
    $nombre  =  $body ["email"];                //esto si
    $clave  =  $body ["clave"];
    $tipo  =  $body ["tipo"];
    
    $usuario= new Cliente($nombre, $clave, $tipo);
    $usuario->GuardarUsuario();     

    $rtaJson = json_encode($rta);
    $response->getBody()->write($rtaJson);//("Hello world!");

    return $response
    ->withHeader('Content-Type', 'application/json')    
    ->withStatus(302);
});

$app->post('/login', function (Request $request, Response $response, $args) {
    
    $body= $request->getParsedBody(); 
    $rta= array("succes"=> true, "data"=> "POST", "body"=>$body);
    $email  =  $body ["email"];                
    $clave  =  $body ["clave"];

    if(Cliente::Buscar($email, $clave))
    {
        $rtaJson = json_encode($rta);    
        $response->getBody()->write($rtaJson);
    }
    else{
        $response->getBody()->write("usuario incorrecto");
    }   

    return $response
    ->withHeader('Content-Type', 'application/json')    
    ->withStatus(302);
});

$app->post('/pizzas', function (Request $request, Response $response, $args) {
    
    $headers = getallheaders();
    $mitoken=$headers['token']??'';
    $body= $request->getParsedBody(); 
    $rta= array("succes"=> true, "data"=> "POST", "body"=>$body);
    $tipo  =  $body ["tipo"];                
    $precio  =  $body ["precio"];
    $stock  =  $body ["stock"];                
    $sabor  =  $body ["sabor"];
    //$foto = $body ["foto"];

    if(Cliente::BuscarAdmin($mitoken))
    {                            
                $tmp_name=$_FILES['foto']['tmp_name'];      //VER esto no anda
                $name=$_FILES['foto']['name'];
                $nombre=$_POST['sabor'].'-'.$name.'-'.time();
                $folder= 'imagenes/'; 
                move_uploaded_file($tmp_name,$folder.$nombre); //la mueve bien, no la muestra!
                //Producto::crearMarcaDeagua($folder.$nombre,'imagenes/marca_de_agua.jpg');
                
                $pizza= new Pizza($tipo, $precio, $stock, $sabor,$nombre);
                //var_dump($pizza);
                if($pizza->tipo != null && $pizza->sabor != null)
                {
                    if(!(Pizza::tipoSabor($pizza->tipo, $pizza->sabor)))
                    {
                        $pizza->guardarPizza(); 
                        $rtaJson = json_encode($rta);    
                        $response->getBody()->write($rtaJson."Pizza registrada correctamente.");
                    }
                    else
                    {
                        $response->getBody()->write("ya existe ese tipo y sabor de pizza"); 
                    }                    
                }
                else
                {
                    $response->getBody()->write("No se puede guardar."); 
                }            
    }
        else
        {
            $response->getBody()->write("No esta autorizado. Solo encargados pueden ingresar pizzas"); 
        }                        

    return $response
    ->withHeader('Content-Type', 'application/json')    
    ->withStatus(302);
});

$app->get('/pizzas', function (Request $request, Response $response, $args) {
    
    $headers = getallheaders();
    $mitoken=$headers['token']??'';

    $headers = getallheaders();
    $mitoken=$headers['token']??'';
    $usuario=Cliente::BuscarAdmin($mitoken);
    //Si es cliente, no muestra todas las pizzas, muestra solo una. 

    $body= $request->getParsedBody(); 
    $rta= array("succes"=> true, "data"=> "POST", "body"=>Pizza::mostrar($usuario));
    
    $rtaJson = json_encode($rta);    
    $response->getBody()->write($rtaJson);

    return $response
    ->withHeader('Content-Type', 'application/json')    
    ->withStatus(302);
});

$app->run();