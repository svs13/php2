<?php

namespace App;

class Config
{

    public $data;

    protected static $instance;


    protected function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }


    public static function instance()
    {
        if ( !is_object(self::$instance) ) {

            self::$instance = new Config();
        }

        return self::$instance;
    }

}