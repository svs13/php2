<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Index extends AdminPanelController
{

    protected function action()
    {
        $news = \App\Models\Article::findAll();

        if (false === $news) {
            //ошибка
            $news = [];
        }
        
        $this->view->news = $news ;
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/index.php');

    }

}