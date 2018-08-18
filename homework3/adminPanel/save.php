<?php

require __DIR__ . '/../autoload.php';

if ( !isset( $_POST['id'] ) ) {
    $article = new \App\Models\Article();
} else {
    $article = \App\Models\Article::findById($_POST['id']); //false | Article
}

if ( is_object($article) ) {
    if ( isset( $_POST['content'] ) ) {
        $article->content = $_POST['content'];
        $article->save();
    }
}

header('Location: /homework3/adminPanel/index.php');
