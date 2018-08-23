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
        if (!isset($_POST['id'])) {
            $article = new \App\Models\Article();
        } else {
            $article = \App\Models\Article::findById($_POST['id']);
        }

        $property = [];
        $property['content'] = $_POST['content'] ?? null;

        try {
            $article->fill($property);
        } catch (Validation $exception) {
            $errors = $exception->getAll();
        }

        if (empty($errors)) {
            $article->save();
        }
        
        $this->view->errors = $errors ?? [];
        $this->view->display(__DIR__ . '/../../Templates/adminPanel/save.php');
    }
}

