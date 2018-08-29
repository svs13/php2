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
     * @throws \App\Exceptions\Db
     * @throws \App\Exceptions\DbNotFoundRecord
     */
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

    /**
     * @throws \App\Exceptions\Db
     * @throws \App\Exceptions\DbNotFoundRecord
     */
    abstract protected function action();
}