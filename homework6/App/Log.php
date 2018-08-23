<?php

namespace App;

class Log
{
    protected $path;

    public function __construct()
    {
        $this->path = __DIR__ . '/../log.txt';
    }

    public function addException(\Exception $exception)
    {
        $line = date('Y-m-d H:i:s') . ' Exception. File: ' . $exception->getFile() . ' Line: ' . $exception->getLine();
        $line.= ' Message: ' . $exception->getMessage();
        file_put_contents($this->path, $line . "\n", FILE_APPEND);

        return $this;
    }
}

