<?php

require  __DIR__ . '/autoload.php';

if ( isset( $_GET['id'] ) ) {

    $article = \App\Models\Article::findById( $_GET['id'] );

}

if ( !is_object($article) ) {

    header('Location: /homework1/index.php');

    exit;
}

include __DIR__ . '/templates/article.php';

