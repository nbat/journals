<?php

namespace Acme\Journals;

use ArrayObject;

class Tag
{
    protected $name;

    protected $articles;

    function __construct($name = "")
    {
        $this->setName($name);
        $this->articles = new ArrayObject(array());
    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function setArticles($articles)
    {
        $this->articles = $articles;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->getName();
    }
}