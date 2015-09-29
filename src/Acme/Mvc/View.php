<?php

namespace Acme\Mvc;

class View
{
    protected $_model;
    protected $_route;

    public function __construct($route, Model $model)
    {
        $this->_route = $route;
        $this->_model = $model;
    }

    public function output($twig)
    {
        return 'default view';
    }
}