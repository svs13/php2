<?php

namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\E404Exception
     */
    public function dispatch()
    {
        if (!$this->access()) {
            die('Доступ закрыт');
        }

        $this->action();
    }

    protected function access() : bool
    {
        return true;
    }

    /**
     * @throws \App\Exceptions\DbException
     * @throws \App\Exceptions\E404Exception
     */
    abstract protected function action();
}

