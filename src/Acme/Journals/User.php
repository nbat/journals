<?php

namespace Acme\Journals;

use ArrayObject;

class User extends \Acme\System\User
{

    protected $_wallet;
    protected $_comments;
    protected $_purchased;

    function __construct()
    {
        $this->_comments = new ArrayObject(array());
        $this->_purchased = new ArrayObject(array());
    }

    public function getPurchases()
    {
        return $this->_purchased;
    }

    public function setPurchases($purchases)
    {
        $this->_purchased = $purchases;
    }

    public function getComments()
    {
        return $this->_comments;
    }

    public function setComments($comments)
    {
        $this->_comments = $comments;
    }

    public function getWallet()
    {
        return $this->_wallet;
    }

    public function setWallet($wallet)
    {
        $this->_wallet = $wallet;
    }
}