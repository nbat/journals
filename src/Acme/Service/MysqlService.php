<?php
namespace Acme\Service;

use Acme\System\Config;
use PDO;

class MysqlService
{
    public $dbh;

    public function __construct($host, $dbname, $port, $user, $password)
    {
        $dsn = sprintf("mysql:host=%s;dbname=%s;port=%s",
            $host, $dbname, $port);

        $this->dbh = new PDO($dsn, $user, $password);
    }

    public function getHandler(){
        return $this->dbh;
    }
}