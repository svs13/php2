<?php

require __DIR__ . '/autoload.php';

$products = \App\Models\Product::findAll();

//var_dump($products);

//include __DIR__ . '/App/Templates/index.php';

$view = new \App\View();

//$view->assign('products', $products);

$view->products = $products;

//$view->display(__DIR__ . '/App/Templates/index.php');

/*
$html = $view->render(__DIR__ . '/App/Templates/index.php');
//....
echo $html;
 */

$view->foo = 42;
$view->bar = 24;

//echo count([1,2,3,4]);
echo count($view);

?> <hr> <?php
//$news = null;
$a = !empty($news);
$a = $news ?: 42;
var_dump( '$news', (bool)$news, !empty($news), $news ?: 42 );

?> <hr> <?php
$news = null;
var_dump( '$news = [];', (bool)$news, !empty($news), $news ?: 42 );

?> <hr> <?php
$news = [[]];
var_dump( '$news = [[]];', (bool)$news, !empty($news), $news ?: 42 );

?> <hr> ===1=== <?php
$a = !empty($news1);

$news1 = 234;
?> <hr> ===2=== <?php
$a = $news1 ?: 42; //(bool)
    echo $a;

