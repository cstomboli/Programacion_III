<?php

require 'vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

$numeroALetras = NumeroALetras::convert(99, '');
echo $numeroALetras;