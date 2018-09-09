<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Delete extends AdminPanelController
{
    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\E404Exception
     */
    protected function action()
    {
        if (isset($_GET['id'])) {
            $article = \App\Models\Article::findById($_GET['id']); //Article

            if (false !== $article) {
                $article->delete();
            }
        }
        header('Location: /homework6/adminPanel/index/');
    }
}

