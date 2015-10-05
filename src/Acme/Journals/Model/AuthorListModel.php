<?php
namespace Acme\Journals\Model;

use Acme\Mvc\Model;
use PDO;

/**
 * Class ArticleListModel
 * @package Acme\Journals\Model
 * @Inject
 */

class AuthorListModel extends Model
{
    protected $authors = array();

    function findAll()
    {
        $statement = $this->getStorage()->getHandler()->prepare('SELECT id, firstName, secondName, slug FROM authors');
        $statement->execute();
        $this->authors = $statement->fetchAll(PDO::FETCH_CLASS, 'Acme\\Journals\\Author');
        return $this->authors;
    }
}