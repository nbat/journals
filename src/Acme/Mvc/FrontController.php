<?php

namespace Acme\Mvc;

use Acme\DI\DI;
use Acme\Mvc\Router;
use Acme\System\Kernel;

class FrontController
{
    private $model;
    private $view;
    private $controller;

    public function __construct(DI $di, Router $router)
    {
        $route = $router->Match($_POST, $_SERVER);
        if ($route !== false) {
            $modelName = $route->GetModel();
            $viewName = $route->GetView();
            $controllerName = $route->GetController();
            $actionName = $route->GetAction();
            $actionParams = $route->GetActionParams();

            $this->model = $di->create($modelName);
            $this->controller = $di->create($controllerName);
            $this->controller->setModel($this->model);
            $this->view = $di->create($viewName);
            $this->view->setModel($this->model);

            if (!empty($actionName)) $this->controller->{$actionName}($actionParams);
        } else {
            $this->model = $di->create("Model");
            $this->view = $di->create("View");
            $this->controller = $di->create("Controller");
        }
    }

    public function output($twig)
    {
        return $this->view->output($twig);
    }
}