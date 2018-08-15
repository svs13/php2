<?php

require __DIR__ . '/autoload.php';

/*
$ex = new Exception('Некое сообщение', 42);

var_dump( $ex->getMessage() );
var_dump( $ex->getCode() );
*/


$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);

$name = !empty($parts[2]) ? ucfirst($parts[2]) : 'Index';

$class = '\App\Controllers\\' . $name;
/*
try {

    $ctrl = new $class;
    $ctrl->dispatch();

} catch (\App\DbException $ex) {
    echo 'Ошибка: ' . $ex->getMessage();
} catch (Throwable $ex) {
    echo 'Ошибка: ' . $ex->getMessage();
} finally {
    echo 'Приложение закончило работу';
}


var_dump($ctrl);
*/


try {

    $ctrl = new $class;
    $ctrl->dispatch();

} catch (\App\DbException | PDOException $ex) {
    echo 'Ошибка: ' . $ex->getMessage();
}