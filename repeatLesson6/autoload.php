<?php


/*
function __autoload($class) {

    switch (true) {
        case 0 === strpos($class, 'Test'):
            $path = substr($class, 5);
            require __DIR__ . '/libs/test/' . str_replace('\\', '/', $path) . '.php';
            //echo $class;
            return;
        default:
            require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    }

}
*/

//require __DIR__ . '/libs/test/autoload.php';
require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($path)) {
        require $path;
    }

});

