<?php

require __DIR__ . '/autoload.php';

//доступные имена контроллеров
$ctrlNames = ['Index', 'Editing', 'Save'];

$ctrlName = $_GET['ctrl'] ?? $ctrlNames[0];

if ( !in_array($ctrlName, $ctrlNames) ) {

    header('Location: /homework4/' . $ctrlNames[0] . '.php');
}

$class = '\App\Controllers\AdminPanel\\' . $ctrlName;

/**
 * @var \App\Controller $ctrl
 */
$ctrl = new $class;
$ctrl->dispatch();
