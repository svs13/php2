<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Editing extends AdminPanelController
{

    protected function action()
    {
        if ( !isset( $_GET['id'] ) ) {
            $article = new \App\Models\Article();
        } else {
            $article = \App\Models\Article::findById( $_GET['id'] ); //false | Article

            if (false == $article) { //ошибка
                return false;
            }
        }

        $this->view->article = $article ;
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/editing.php');
    }

}