<?php

require __DIR__ . '/autoload.php';

if ( isset( $_POST['command'] ) ) {

    switch ( $_POST['command'] ) {

        case 'add':
            if ( isset( $_POST['header'], $_POST['content'], $_POST['author'] ) ) {

                $article = new \App\Models\Article();

                $article->header = $_POST['header'];
                $article->content = $_POST['content'];
                $article->author = $_POST['author'];

                $article->save();

            }
            break;

        case 'edit':
            if ( isset( $_POST['id'], $_POST['header'], $_POST['content'], $_POST['author'] ) ) {
                if ( is_numeric( $_POST['id'] ) ) {

                    $article = \App\Models\Article::findById( $_POST['id'] );

                    if ( is_object($article) ) {

                        $article->header = $_POST['header'];
                        $article->content =  $_POST['content'];
                        $article->author = $_POST['author'];

                        $article->save();

                    }

                }
            }
            break;

        case 'delete':
            if ( isset( $_POST['id'] ) ) {
                if ( is_numeric( $_POST['id'] ) ) {

                    $article = \App\Models\Article::findById( $_POST['id'] );

                    if ( is_object($article) ) {

                        $article->delete();

                    }
                }
            }
            break;
    }

}


$news = \App\Models\Article::findAll();

include __DIR__ . '/templates/adminPanel.php';
