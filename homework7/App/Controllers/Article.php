<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{
    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\E404Exception
     */
    protected function action()
    {
        if (!isset($_GET['id'])) {
            header('Location: /homework7/');
            exit;
        }

        $article = \App\Models\Article::findById( $_GET['id'] );

        if (false === $article) {
            throw new \App\Exceptions\E404Exception('Ошибка 404 - не найдена запись в базе данных');
        }

        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }
}

