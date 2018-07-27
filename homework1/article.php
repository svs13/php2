<?php

require  __DIR__ . '/autoload.php';


if ( isset( $_GET['id'] ) ) {

    $art = \App\Models\Article::findById( $_GET['id'] );

    if ( is_object($art) ) {

        $header = $art->getHeader();
        $content = $art->getContent();
        $author = $art->getAuthor();
    }
}

if ( !isset($header) ) {

    header('Location: /homework1/index.php');

    exit;
}


include __DIR__ . '/templates/article.php';

