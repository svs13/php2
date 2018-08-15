<?php

namespace App;

abstract class MultiException extends \Exception
{
    /**
     * @var \Exception[] $errors
     */
    protected $errors;

    public function add(\Exception $exception)
    {
        $this->errors[] = $exception;
    }

    public function empty()
    {
        return empty($this->errors);
    }

    public function getAll()
    {
        return $this->errors;
    }

}