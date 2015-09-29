<?php

namespace Acme\Mvc;

class Route
{
    public $model;
    public $view;
    public $controller;
    public $name;

    public function __construct($name, $model, $view, $controller)
    {
        $this->name = $name;
        $this->model = $model;
        $this->view = $view;
        $this->controller = $controller;
    }
}