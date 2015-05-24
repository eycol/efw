<?php
namespace Core\Loader;

class Loader{

    public static function load($namespace){
        $appDir = dirname(dirname(__FILE__));
        $file = $appDir . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . '.php';
        if(file_exists($file)){
            require_once $file;
            return true;
        }else{
            return false;
        }
    }

}
