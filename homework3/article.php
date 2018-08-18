<?php

require  __DIR__ . '/autoload.php';

if ( isset( $_GET['id'] ) ) {
    if ( is_numeric( $_GET['id'] ) ) {

        $article = \App\Models\Article::findById( $_GET['id'] );
    }
}

if ( !is_object($article) ) {

    header('Location: /homework3/index.php');

    exit;
}

$view = new \App\View();
$view->article = $article;

$view->display(__DIR__ . '/App/Templates/article.php');
