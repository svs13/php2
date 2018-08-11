<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{

    protected function action()
    {
        if ( isset( $_GET['id'] ) ) {

            $article = \App\Models\Article::findById( $_GET['id'] ); //false | Article
        }

        if ( empty($article) ) { //ошибка

            return false;
        }

        $this->view->article = $article ;
        $this->view->display(__DIR__ . '/../Templates/article.php');

    }

}