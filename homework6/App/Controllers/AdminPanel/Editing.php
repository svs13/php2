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
        if (!isset($_GET['id'])) {
            header('Location: /homework6/adminPanel/index/');
            exit;
        }

        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/editing.php');
    }
}

