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

    /**
     * @return array
     * TODO:
     * - refactor into SPL
     * - reduce number of loops
     * - reduce number of queries
     * - cache requests
     * - cache queries
     */
    function findAll()
    {
        $statement = $this->getStorage()->getHandler()->prepare('SELECT id, id, title, slug, shortDescription, content, price FROM articles');
        $statement->execute();
        $this->articles = $statement->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_CLASS, 'Acme\\Journals\\Article');
        $this->articles = array_map('reset', $this->articles);

        $ids = array();
        foreach ($this->articles as $article) {
            $ids[] = $article->getId();
        }
        $qMarks = str_repeat('?,', count($ids) - 1) . '?';

        $statement = $this->getStorage()->getHandler()->prepare(
            "SELECT a.id as articleId ,t.* FROM `articles` a Inner Join articles2tags a2t on (a2t.articleId = a.id) Left Join tags t on (a2t.tagId = t.id) HAVING a.id IN ($qMarks)");
        $statement->execute($ids);
        $tagsArray = $statement->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_CLASS, 'Acme\\Journals\\Tag');

        foreach($tagsArray as $articleId => $tagGroup){
            $this->articles[$articleId]->setTags($tagGroup);
        }

        $statement = $this->getStorage()->getHandler()->prepare(
            "SELECT a.id as articleId ,au.id, au.firstName, au.lastName, au.slug FROM `articles` a Inner Join articles2authors a2a on (a2a.articleId = a.id) Left Join authors au on (a2a.authorId = au.id) HAVING a.id IN ($qMarks)");
        $statement->execute($ids);
        $authorsArray = $statement->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_CLASS, 'Acme\\Journals\\Author');

        foreach($authorsArray as $articleId => $authorGroup){
            $this->articles[$articleId]->setAuthors($authorGroup);
        }

        return $this->articles;
    }
}