<?php

namespace P4\config;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {
        $class = str_replace('P4', '', $class);
        $class = str_replace('\\', '/', $class);
        require '../'.$class.'.php';
    }
}
