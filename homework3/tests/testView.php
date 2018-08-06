<?php

require __DIR__ . '/../autoload.php';

$view = new \App\View();
$view->message = 'Hello world';

var_dump( $view->message );

var_dump( count($view) );

$view->test1 = 't1';
$view->test2 = 't2';
$view->test3 = 't3';

var_dump( count($view) );

foreach ($view as $index => $value) {
    var_dump($index);
    var_dump($value);
}

//обращение к неизвестному пулю $view
var_dump($view->notFound);