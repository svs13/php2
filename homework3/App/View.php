<?php

namespace App;

class View implements \Countable, \Iterator
{
    public $data = [];

    use MagicMethodsTrait;
    use IteratorTrait;

    public function display($template)
    {
        foreach ($this->data as $name => $value) {
            $$name = $value;
        }

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

    public function count()
    {
        return count($this->data);
    }




}