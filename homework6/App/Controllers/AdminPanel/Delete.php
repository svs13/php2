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
        if (!isset($_GET['id'])) {
            return false;
        }

        $article = \App\Models\Article::findById($_GET['id']); //Article
        $article->delete();

        $this->view->display(__DIR__ . '/../../Templates/adminPanel/delete.php');
    }
}

