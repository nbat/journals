<?php

namespace Acme\Mvc;

class Controller
{
    protected $model;

    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }
}