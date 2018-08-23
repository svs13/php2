<?php

namespace App\Controllers;

class Product extends \App\Controller
{

    protected function action()
    {
        $this->view->product = \App\Models\Product::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/product.php');

    }

}