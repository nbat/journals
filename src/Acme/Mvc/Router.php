<?php

namespace Acme\Mvc;

class Router
{
    private $_table;

    public function __construct()
    {
        $this->_table = array();
    }

    public function addRoute(Route $route)
    {
        $this->_table[$route->name] = $route;
    }

    public function getRoute($routeName)
    {
        $routeName = strtolower($routeName);
        if (!isset($this->_table[$routeName])) {
            return $this->_table['home'];
        }

        return $this->_table[$routeName];
    }
}