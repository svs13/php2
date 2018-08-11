<?php

namespace App;

class Config
{

    public $data;

    protected static $config;


    protected function __construct()
    {
        $this->data = require __DIR__ . '/../config.php';
    }


    public static function instance()
    {
        if ( !is_object(self::$config) ) {

            self::$config = new Config();
        }

        return self::$config;
    }

}