<?php

namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access(): bool
    {
        return true;
    }

    public function dispatch()
    {
        if ($this->access()) {

//            try {
                $this->action();
//            } catch (\Exception $ex) {
//                die('Ошибка: ' . $ex->getMessage());
//               throw $ex;
//            }


        } else {
            die('Ошибка доступа');
        }
    }

    abstract protected function action();

}