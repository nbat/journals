<?php

namespace Acme\Journals;

use ArrayObject;

class Article
{
    protected $_title;
    protected $_shortDescription;
    protected $_content;
    protected $_price;

    protected $_category;
    protected $_authors;
    protected $_tags;
    protected $_comments;

    function __construct()
    {
        $this->_category = new Category();
        $this->_authors = new ArrayObject(array());
        $this->_tags = new ArrayObject(array());
        $this->_comments = new ArrayObject(array());
    }

    public function getTags()
    {
        return $this->_tags;
    }

    public function setTags($tags)
    {
        $this->_tags = $tags;
    }

    public function getCategory()
    {
        return $this->_category;
    }

    public function setCategory(Category $category)
    {
        $this->_category = $category;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function getShortDescription()
    {
        return $this->_shortDescription;
    }

    public function setShortDescription($shortDescription)
    {
        $this->_shortDescription = $shortDescription;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function setContent($content)
    {
        $this->_content = $content;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function setPrice($price)
    {
        $this->_price = $price;
    }

    public function addAuthor(Author $author)
    {
        $this->_authors[] = $author;
    }

    public function getAuthors()
    {
        return $this->_authors;
    }
}