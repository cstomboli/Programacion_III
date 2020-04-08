<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit335eddd251bfd9310a8dc1fe104c27b5
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Luecano\\NumeroALetras\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Luecano\\NumeroALetras\\' => 
        array (
            0 => __DIR__ . '/..' . '/luecano/numero-a-letras/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit335eddd251bfd9310a8dc1fe104c27b5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit335eddd251bfd9310a8dc1fe104c27b5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}