<?php

require'saludar.php';
function saludarEspanol($nombre="NN") // si tengo otro parametro tmb va a tener q ser por default.
    {
        //echo saludar($nombre);
        $persona = new Persona('Juan');
        echo $persona->saludar();
    }
?>