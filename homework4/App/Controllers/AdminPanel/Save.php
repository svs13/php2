<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;

class Save extends AdminPanelController
{

    protected function action()
    {
        if ( isset( $_POST['command'] ) ) {

            switch ( $_POST['command'] ) {
                case 'edit':
                        if ( isset( $_POST['id'], $_POST['content'] ) ) {

                            if ( '' === $_POST['id'] ) { //новая новость
                                $article = new \App\Models\Article();
                            } else { //существующая новость
                                $article = \App\Models\Article::findById( $_POST['id'] );
                            }

                            if (false !==$article) { //если нет ошибок
                                $article->content = $_POST['content'];
                                $article->save();
                                $res = true;
                            }

                        }
                    break;
                case 'delete':
                    if ( isset( $_POST['id'] ) ) {

                        $article = \App\Models\Article::findById( $_POST['id'] );

                        if (false !==$article) { //ошибка

                            $article->delete();
                            $res = true;
                        }

                    }
                    break;
            }
        }

        if ( !isset($res) ) {
            $res = false;
        }
        
        $this->view->result = $res;
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/save.php');
    }

}