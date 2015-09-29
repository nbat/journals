<?php
namespace Acme\Journals\Model;

use Acme\Journals\Article;
use Acme\Journals\Author;
use Acme\Journals\Category;
use Acme\Mvc\Model;

class ArticleListModel extends Model
{

    protected $_articles;

    function __construct()
    {
        $this->_articles = array();
        for ($i = 0; $i < 10; ++$i) {
            $a = new Article();
            $a->setTitle("Healthy dish you can preapare quickly");
            $a->setContent("Nulla vestibulum nec, dignissim in, cursus molestie. Donec est. Integer neque quis porta nisl. Nam pulvinar, quam molestie ultricies vitae.");
            $a->setCategory(new Category());
            $a->setPrice(5);
            $a->setShortDescription("Nulla vestibulum nec, dignissim in, cursus molestie. Donec est.");
            $a->addAuthor(new Author("Ernest","Hemingway"));
            $this->_articles[] = $a;
        }
    }

    function findAll()
    {
        return $this->_articles;
    }
}