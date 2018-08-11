<?php

require __DIR__ . '/autoload.php';

//$ctrl = new \App\Controllers\Index();
//$ctrl->actionOneProduct();

$ctrl = new \App\Controllers\Product();
$ctrl->dispatch();