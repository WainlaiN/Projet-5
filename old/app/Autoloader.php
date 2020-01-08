<?php


namespace App;

class Autoloader
{

    static function register()
    {

        spl_autoload_register(array(__CLASS__, 'autoload'));

    }


    /**
     * Include file corresponding class
     * @param $class string class name to load
     */
    static function autoload($class)
    {
        var_dump($class);
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . 'Autoloader.php/' . $class . '.php';
            var_dump($class);

        }

    }


}