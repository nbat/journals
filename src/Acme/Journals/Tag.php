<?php

namespace Acme\Journals;

class Tag
{
    protected $id;
    protected $name;
    protected $slug;

    function __construct()
    {
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function __toString()
    {
        return (string)$this->getName();
    }
}