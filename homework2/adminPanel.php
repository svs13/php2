<?php

require __DIR__ . '/autoload.php';

if ( isset( $_POST['command'] ) ) {

    switch ( $_POST['command'] ) {

        case 'add':
            if ( isset( $_POST['content']) ) {

                $article = new \App\Models\Article();

                $article->content = $_POST['content'];

                $article->save();

            }
            break;

        case 'edit':
            if ( isset( $_POST['id'], $_POST['content']) ) {
                if ( is_numeric( $_POST['id'] ) ) {

                    $article = \App\Models\Article::findById( $_POST['id'] );

                    if ( is_object($article) ) {

                        $article->content =  $_POST['content'];

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
