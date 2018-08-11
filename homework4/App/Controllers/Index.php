<?php

namespace App\Controllers;

use App\Controller;

class Index extends Controller
{

    protected function action()
    {
        $news = \App\Models\Article::findAll();

        if (false === $news) {
            //ошибка
            $news = [];
        }

        $this->view->news = $news ;
        $this->view->display(__DIR__ . '/../Templates/index.php');

    }

}