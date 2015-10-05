<?php
namespace Acme\Journals\Model;

use Acme\Mvc\Model;
use PDO;

/**
 * Class ArticleListModel
 * @package Acme\Journals\Model
 */

class ArticleListModel extends Model
{
    protected $articles = array();

    function findAll()
    {
        $statement = $this->getStorage()->getHandler()->prepare('SELECT id, title, slug, shortDescription, content, price FROM articles');
        $statement->execute();
        $this->articles = $statement->fetchAll(PDO::FETCH_CLASS, 'Acme\\Journals\\Article');
        return $this->articles;
    }
}