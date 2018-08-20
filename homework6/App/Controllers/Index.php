<?php
namespace App\Controllers;

use App\Controller;

class Index extends Controller
{
    /**
     * @throws \App\Exceptions\Db
     */
    protected function action()
    {
        $this->view->news = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }
}

