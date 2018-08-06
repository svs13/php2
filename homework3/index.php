<?php

require  __DIR__ . '/autoload.php';

$news = \App\Models\Article::findLastRecords(3);

if (false === $news) {
    //обработка ошибки
    $news = [];
}

$view = new \App\View();
$view->news = $news;

$view->display(__DIR__ . '/App/Templates/index.php');
