<?php
namespace Acme\Journals\Model;

use Acme\Mvc\Model;
use PDO;

/**
 * Class ArticleListModel
 * @package Acme\Journals\Model
 * @Inject
 */

class TagListModel extends Model
{
    protected $tags = array();

    function findAll()
    {
        $statement = $this->getStorage()->getHandler()->prepare('SELECT id, name, slug FROM tags');
        $statement->execute();
        $this->tags = $statement->fetchAll(PDO::FETCH_CLASS, 'Acme\\Journals\\Tag');
        return $this->tags;
    }
}