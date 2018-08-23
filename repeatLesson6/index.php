<?php

require __DIR__ . '/autoload.php';

$foo = new \Test\Foo();
$foo->say();


$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);

$name = !empty($parts[2]) ? ucfirst($parts[2]) : 'Index';

$class = '\App\Controllers\\' . $name;

try {

    $ctrl = new $class;
    $ctrl->dispatch();

} catch (\App\DbException | PDOException $ex) {
    echo 'Ошибка: ' . $ex->getMessage();
}