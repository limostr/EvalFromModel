<?php


class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {

            $file = BASE_PATH."/../library/EvalFromModel/".str_ireplace ("\\", DIRECTORY_SEPARATOR, $class).'.php';
            $file2 = BASE_PATH."/".str_ireplace ("\\", DIRECTORY_SEPARATOR, $class).'.php';

            if (file_exists($file)) {

                include $file;
                return true;
            }else if (file_exists($file2)) {

                include $file2;
                return true;
            } else{
                //throw new Exception("Erreur de chargement de la class : $class -> $file");
                return false;
            }

        });
    }
}
