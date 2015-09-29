<?php

namespace Acme\Mvc;

class Controller
{
    private $_model;

    public function getName()
    {
        return get_class($this);
    }

    public function __construct(Model $model)
    {
        $this->_model = $model;
    }
}