<?php
namespace Acme\Journals\Model;

use Acme\Mvc\Model;
use PDO;

/**
 * Class ArticleListModel
 * @package Acme\Journals\Model
 * @Inject
 */

class CategoryListModel extends Model
{
    protected $categories = array();

    function findAll()
    {
        $statement = $this->getStorage()->getHandler()->prepare('SELECT id, name, slug FROM categories');
        $statement->execute();
        $this->categories = $statement->fetchAll(PDO::FETCH_CLASS, 'Acme\\Journals\\Category');
        return $this->categories;
    }
}