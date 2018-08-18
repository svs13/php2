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
                $res = true;
            }
        }

        $this->view->result = $res ?? false;
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/delete.php');
    }

}