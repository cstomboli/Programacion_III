<?php

/*
    GET: Obtener recursos. Pedir datos.
    GET id: Obtenemos uno especifico.
    POST: Crear recursos.
    PUT: Modificar recursos.
    DELETE: Borrar recursos.
    GET: entidad -> trae todo
    GET: entidad ? id=1-> trae datos del elemento indicado.
    POST: entiedad -> Guardo datos que vienen por post.
    
*/


//var_dump($_GET); //Es un array! Me muestra la informacion que me envien a traves de un metodo Get.

//para acceder al nombre 



if(isset($_GET['nombre']))
{
    echo $_GET['nombre'];
}
elseif(isset($_GET['nombre']))
{
    echo $_POST['nombre'];

}
else{
    echo "No disponible";
}

//var_dump($_POST);
//echo json_encode($_POST);

//$rta = array;
//$rta ->succes = true;
//$rta ->data = '';

//echo json_encode($rta);


