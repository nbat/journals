<?php

namespace Acme\Journals;

use Acme\System\User;
use ArrayObject;

class Author extends User
{
    protected $firstName;
    protected $lastName;
    protected $slug;
    protected $about;
    protected $articles;

    function __construct()
    {

    }

    public function getArticles()
    {
        return $this->articles;
    }

    public function setArticles($articles)
    {
        $this->articles = $articles;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstname)
    {
        $this->firstName = $firstname;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastname)
    {
        $this->lastName = $lastname;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function setAbout($about)
    {
        $this->about = $about;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
}