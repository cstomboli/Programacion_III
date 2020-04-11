<?php

class miPais{

    public static $pais= "So soy Argentina";   

    public static function MetodoEstatico()
    {
        return self:: $pais;
    }
}