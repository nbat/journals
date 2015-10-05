<?php

namespace Acme\Mvc;

class Route
{
    public $model;
    public $view;
    public $controller;
    public $action;

    private $url;
    private $methods = array('GET', 'POST', 'PUT', 'DELETE');
    private $settings;
    private $actionParams;
    private $filters = array();


    public function __construct($resource, $settings)
    {
        $this->setUrl($resource);
        $this->setSettings($settings);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getView()
    {
        return $this->view;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function getActionParams()
    {
        return $this->actionParams;
    }

    public function setActionParams(array $params)
    {
        $this->actionParams = $params;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    public function getRegex()
    {
        return preg_replace_callback("/(:\w+)/", array(&$this, 'replacePlaceholders'), $this->url);
    }

    private function replacePlaceholders($matches)
    {
        if (isset($matches[1]) && isset($this->filters[$matches[1]])) {
            return $this->filters[$matches[1]];
        }
        return "([\w-%]+)";
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function setSettings($settings)
    {
        $this->settings = $settings;
        if (isset($settings['_controller'])) {
            $reflection = explode('::', $settings['_controller']);
            if (isset($reflection[0])) {
                $this->setController($reflection[0]);
            }
            if (isset($reflection[1])) {
                $this->setAction($reflection[1]);
            }
        }
        if (isset($settings['_model'])) {
            $this->setModel($settings['_model']);
        }
        if (isset($settings['_view'])) {
            $this->setView($settings['_view']);
        }
        if (isset($settings['_params'])) {
            $this->setActionParams($settings['_params']);
        }
    }

    public function getMethods()
    {
        return $this->methods;
    }

    public function setMethods(array $methods)
    {
        $this->methods = $methods;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = (rtrim((string)$url, '/') . '/');
    }
}