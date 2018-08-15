<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Index extends AdminPanelController
{

    /**
     * @throws \App\Exceptions\Db
     */
    protected function action()
    {
        $this->view->news = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/index.php');
    }

}