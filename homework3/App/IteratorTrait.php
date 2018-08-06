<?php

namespace App;

trait IteratorTrait
{

    public function rewind()
    {
        reset($this->data);
    }


    public function next()
    {
        next($this->data);
    }


    public function valid()
    {
        return null !== key($this->data); //сравение с current() нарушит логику,т.к. значением может быть false
    }


    public function current()
    {
        return  current($this->data);
    }


    public function key()
    {
        return key($this->data);
    }

}