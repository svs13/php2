<?php

require  __DIR__ . '/autoload.php';

if ( isset( $_GET['id'] ) ) {
    if ( is_numeric( $_GET['id'] ) ) {

        $article = \App\Models\Article::findById( $_GET['id'] );
    }
}

if ( !is_object($article) ) {

    header('Location: /homework2/index.php');

    exit;
}

$view = new \App\View();
$view->article = $article;

var_dump( $view->article->author );
var_dump($article);

$view->display(__DIR__ . '/App/Templates/article.php');

