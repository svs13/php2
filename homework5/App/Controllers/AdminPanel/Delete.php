<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Delete extends AdminPanelController
{

    /**
     * @throws \App\Exceptions\Db
     * @throws \App\Exceptions\DbNotFoundRecord
     */
    protected function action()
    {
        if ( isset( $_GET['id'] ) ) {
            $article = \App\Models\Article::findById( $_GET['id'] ); //Article
            $article->delete();
        }

        header('Location: /homework5/adminPanel/index/');
    }

}