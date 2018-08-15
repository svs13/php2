<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
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

        $this->view->article = \App\Models\Article::findById( $_GET['id'] );
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }

}