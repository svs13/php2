<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Editing extends AdminPanelController
{

    /**
     * @throws \App\Exceptions\Db
     * @throws \App\Exceptions\DbNotFoundRecord
     */
    protected function action()
    {
        if ( !isset( $_GET['id'] ) ) {
            return false;
        }

        if ( 'new' === $_GET['id'] ) {
            $article = new \App\Models\Article();
        } else {
            $article = \App\Models\Article::findById( $_GET['id'] );
        }

        $this->view->article = $article ;
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/editing.php');
    }

}