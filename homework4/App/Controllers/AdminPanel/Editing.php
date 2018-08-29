<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Editing extends AdminPanelController
{

    protected function action()
    {
        if ( isset( $_GET['id'] ) ) {

            $article = \App\Models\Article::findById( $_GET['id'] ); //false | Article
        }

        if ( empty($article) ) { //ошибка

            header('Location: /homework4/adminPanel/index/');

            exit;
        }

        $this->view->article = $article ;
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/editing.php');
    }

}