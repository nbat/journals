<?php

namespace Acme\Journals;

class Category
{
    protected $id;
    protected $name;
    protected $slug;

    function __construct()
    {
    }

    public function getId()
    {
        return $this->name;
    }

    public function setId($id)
    {
        $this->id = $id;
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
        return (string)$this->GetName();
    }
}