.htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]

composer init     			composer install
composer require firebase/php-jwt 
//jwt.com o algo asi

//http://www.slimframework.com/
composer require slim/slim:"4.*"	composer require slim/psr7 		

//https://github.com/illuminate/database
composer require "illuminate/events" 	composer require "illuminate/database"

"autoload": {
        "psr-4": {
            "App\\": "src",
            "Config\\": "config"
        }
    }
composer dump-autoload o composer dumpautoload

//SI vas a composer.json aparece todo lo que esta instalado
//https://laravel.com/docs/7.x/queries Metodos a usar
//ver Database / Eloquent ORM
//ver relaciones