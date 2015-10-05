<?php
namespace Acme\DI;

class Rule {
    public $shared = false;
    public $constructParams = array();
    public $substitutions = array();
    public $newInstances = array();
    public $instanceOf;
    public $call = array();
    public $inherit = true;
    public $shareInstances = array();
}