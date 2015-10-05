<?php

namespace Acme\Mvc;

use Acme\Service\MysqlService;

/**
 * Class Model
 * @package Acme\Mvc
 */
class Model
{
    protected $mysql;
    public function __construct(MysqlService $mysql)
    {
        $this->mysql = $mysql;
    }
    public function getStorage()
    {
        return $this->mysql;
    }

}