<?php

namespace Acme\Mvc;

class View
{
    protected $model;

    public function setModel(Model $m)
    {
        $this->model = $m;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function output($twig)
    {
        return 'default view';
    }
}