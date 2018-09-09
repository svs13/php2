<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Editing extends AdminPanelController
{
    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\E404Exception
     */
    protected function action()
    {
        if (!isset($_GET['id'])) {
            header('Location: /homework6/adminPanel/index/');
            exit;
        }

        $article = \App\Models\Article::findById( $_GET['id'] );

        if (false === $article) {
            throw new \App\Exceptions\E404Exception('Ошибка 404 - не найдена запись в базе данных');
        }

        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/editing.php');
    }
}

