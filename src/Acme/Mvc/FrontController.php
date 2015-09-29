<?php

namespace Acme\Mvc;

use Acme\Mvc\Router;

class FrontController
{
    private $_controller;
    private $_view;

    public function __construct(Router $router, $routeName, $action)
    {
        $route = $router->getRoute($routeName);

        $modelName = $route->model;
        $controllerName = $route->controller;
        $viewName = $route->view;

        $model = new $modelName;
        $this->_controller = new $controllerName($model);
        $this->_view = new $viewName($routeName, $model);

        if(!empty($action)){
            $this->_controller->$action();
        }
    }

    public function output($twig)
    {
        return $this->_view->output($twig);
    }
}