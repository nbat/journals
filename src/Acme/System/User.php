<?php

namespace Acme\System;

abstract class User
{
    protected $_username;
    protected $_password;

    public function getUsername()
    {
        return $this->_username;
    }

    public function setUsername($username)
    {
        $this->_username = $username;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setPassword()
    {
        $this->_password;
    }
}