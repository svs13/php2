<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Save extends AdminPanelController
{

    protected function action()
    {

        if ( !isset( $_POST['id'] ) ) {
            $article = new \App\Models\Article();
        } else {
            $article = \App\Models\Article::findById( $_POST['id'] ); //false | Article
        }

        if ( is_object($article) ) {
            if ( isset( $_POST['content'] ) ) {
                $article->content = $_POST['content'];
                $article->save();
                $res = true;
            }
        }
        
        $this->view->result = $res ?? false;
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/save.php');
    }

}