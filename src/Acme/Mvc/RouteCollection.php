<?php

namespace Acme\Mvc;

use SplObjectStorage;

class RouteCollection extends SplObjectStorage
{
    public function attachRoute(Route $route)
    {
        parent::attach($route, null);
    }

    public function all()
    {
        $routes = array();
        foreach($this as $route) {
            $routes[] = $route;
        }
        return $routes;
    }
}