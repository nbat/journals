<?php

namespace Acme\Journals;

use Acme\System\Utility;
use ArrayObject;

class Article
{
    protected $id;

    protected $title;
    protected $shortDescription;
    protected $content;
    protected $price;
    protected $slug;

    protected $category;
    protected $authors;
    protected $tags;
    protected $comments;

    function __construct()
    {
        $this->category = new Category();
        $this->authors = new ArrayObject(array());
        $this->tags = new ArrayObject(array());
        $this->comments = new ArrayObject(array());
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function setAuthors(array $authors)
    {
        $this->authors = $authors;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        $this->setSlug();
    }

    public function setSlug()
    {
       $this->slug = Utility::CreateSlug($this->getTitle());
    }

    public function getSlug()
    {
        return $this->slug;
    }



    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function addAuthor(Author $author)
    {
        $this->authors[] = $author;
    }

}