<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Delete extends AdminPanelController
{

    protected function action()
    {

        if ( isset( $_GET['id'] ) ) {

            $article = \App\Models\Article::findById( $_GET['id'] ); //false | Article

            if ( false !== $article ) {
                $article->delete();
            }
        }

        header('Location: /homework4/adminPanel/index/');
    }

}