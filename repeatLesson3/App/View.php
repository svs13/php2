<?php

namespace App;

class View implements \Countable
{
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

/*
    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }
*/

    public function display($template)
    {
        //$this Всегда неявно присутствует.
        //$data = $this->data;

        foreach ($this->data as $name => $value) {
            $$name = $value;
        }

//        extract($this->data);
        //обратная compact()
        var_dump($this);
        include $template;
    }


    public function render($template)
    {
        ob_start();
        $this->display($template);
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }


}