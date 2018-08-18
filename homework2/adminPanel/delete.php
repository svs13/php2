<?php

require __DIR__ . '/../autoload.php';

if ( isset( $_POST['id'] ) ) {

    $article = \App\Models\Article::findById( $_POST['id'] ); //false | Article

    if ( false !== $article ) {
        $article->delete();
    }
}

header('Location: /homework2/adminPanel/index.php');