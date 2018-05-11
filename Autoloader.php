<?php


class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
           // die($class);
            $file = str_ireplace ("\\", DIRECTORY_SEPARATOR, $class).'.php';

            if (file_exists($file)) {
                include $file;
                return true;
            }else{
                throw new Exception("Erreur de chargement de la class : $class -> $file");
                return false;
            }

        });
    }
}
