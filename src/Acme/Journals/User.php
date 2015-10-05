<?php

namespace Acme\Journals;

use ArrayObject;

class User extends \Acme\System\User
{

    protected $wallet;
    protected $comments;
    protected $purchased;

    function __construct()
    {
        $this->comments = new ArrayObject(array());
        $this->purchased = new ArrayObject(array());
    }

    public function getPurchases()
    {
        return $this->purchased;
    }

    public function setPurchases($purchases)
    {
        $this->purchased = $purchases;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    public function getWallet()
    {
        return $this->wallet;
    }

    public function setWallet($wallet)
    {
        $this->wallet = $wallet;
    }
}