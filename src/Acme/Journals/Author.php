<?php

namespace Acme\Journals;

use Acme\System\User;
use ArrayObject;

class Author extends User
{
    protected $_firstName;
    protected $_lastName;
    protected $_about;
    protected $_articles;

    function __construct($firstName, $lastName)
    {
        $this->_articles = new ArrayObject(array());
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    public function getArticles()
    {
        return $this->_articles;
    }

    public function setArticles($articles)
    {
        $this->_articles = $articles;
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function setFirstName($firstname)
    {
        $this->_firstName = $firstname;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    public function setLastName($lastname)
    {
        $this->_lastName = $lastname;
    }

    public function getAbout()
    {
        return $this->_about;
    }

    public function setAbout($about)
    {
        $this->_about = $about;
    }
}