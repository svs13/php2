<?php
namespace App\Controllers;

class Error extends \App\Controller
{
    public $message;
    public $htmlResponseCode;

    protected function action()
    {
        if (null !== $this->htmlResponseCode) {
            http_response_code($this->htmlResponseCode);
        }

        $this->view->error = $this->message ?? '';
        $this->view->display(__DIR__ . '/../Templates/error.php');
    }
}

