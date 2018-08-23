<?php

namespace App\Controllers;

class Index extends \App\Controller
{

    protected function action()
    {
        $this->view->products = \App\Models\Product::findAll();
        $this->view->display(__DIR__ . '/../Templates/index.php');

    }
/*
    public function actionOneProduct()
    {
        $view = new \App\View();
        $view->product = \App\Models\Product::findById($_GET['id']);

        $view->display(__DIR__ . '/../Templates/product.php');

    }
*/
}