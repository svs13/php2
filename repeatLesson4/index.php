<?php

require __DIR__ . '/autoload.php';

/*
$ctrl = new \App\Controllers\Index();
$ctrl->dispatch();
*/


/*
$name = $_GET['ctrl'] ?? 'Index';
$class = '\App\Controllers\\' . $name;

$ctrl = new $class;
$ctrl->dispatch();

var_dump($ctrl); die;
*/



$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);

$name = isset($parts[1]) ? ucfirst($parts[1]) : 'Index';
$class = '\App\Controllers\\' . $name;

$ctrl = new $class;
$ctrl->dispatch();

var_dump($ctrl); die;
