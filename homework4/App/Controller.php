<?php

namespace App;

abstract class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function dispatch()
    {
        if ( !$this->access() ) {

            die('Доступ закрыт');
        }

        $this->action();
    }

    protected function access() : bool
    {
        return true;
    }

    abstract protected function action();
}