<?php
namespace Acme\Journals\Model;

use Acme\Journals\Article;
use Acme\Journals\Author;
use Acme\Journals\Category;
use Acme\Journals\Tag;
use Acme\Mvc\Model;

/**
 * Class ArticleModel
 * @package Acme\Journals\Model
 * @Inject Container
 */

class ArticleModel extends Model
{

    public $article;

    function findBySlug($slug)
    {
        $statement = $this->getStorage()->getHandler()->prepare('SELECT id, title, slug, shortDescription, content, price FROM articles WHERE slug=?');
        $statement->execute([$slug]);
        $this->article = $statement->fetchObject('Acme\\Journals\\Article');
        return $this->article;
    }
}