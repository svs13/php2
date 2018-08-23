<?php

namespace App;

class AdminDataTable {

    protected $models;
    protected $functions;

    /**
     * AdminDataTable constructor.
     * @param \Generator $models
     * @param callable[] $functions
     */
    public function __construct($models, $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render($template) {
        $view = new View();
        $view->models = $this->models;
        $view->functions = $this->functions;
        return $view->render($template);
    }
}