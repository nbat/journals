<?php

namespace Acme\Journals;

use ArrayObject;

class Category
{
    protected $_name;

    protected $_articles;

    function __construct()
    {
        $this->_articles = new ArrayObject(array());
    }

    public function getArticles()
    {
        return $this->_articles;
    }

    public function setArticles($articles)
    {
        $this->_articles = $articles;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }
}