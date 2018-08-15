<?php

namespace App\Controllers\AdminPanel;

use App\AdminPanelController;
use App\Exceptions\Validation;

class Save extends AdminPanelController
{

    /**
     * @throws \App\Exceptions\Db
     * @throws \App\Exceptions\DbNotFoundRecord
     */
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

                        $property = [];
                        $property['content'] = $_POST['content'];

                        try {
                            
                            $article->fill($property);
                            
                        } catch (Validation $exception) {
                            $errors = $exception->getAll();
                        }

                        if ( empty($errors) ) {
                            $article->save();
                        } else {
                            unset($article);
                        }

                    }
                    break;
                case 'delete':
                    if ( isset( $_POST['id'] ) ) {
                        $article = \App\Models\Article::findById( $_POST['id'] );
                        $article->delete();
                    }
                    break;
            }
        }

        $this->view->result = isset($article);
        $this->view->errors = $errors ?? [];

        $this->view->display(__DIR__ . '/../../Templates/adminPanel/save.php');
    }

}