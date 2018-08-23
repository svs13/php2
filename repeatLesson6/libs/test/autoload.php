<?php
spl_autoload_register(function ($class) {
    $path = substr($class, 5);
    $path = __DIR__ . '/libs/test/' . str_replace('\\', '/', $path) . '.php';
    if (is_readable($path)) {
        require $path;
    }
});
