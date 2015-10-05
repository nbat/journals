<?php

namespace Acme\DI;

class Instance {
    public $name;
    public function __construct($instance) {
        $this->name = $instance;
    }
}