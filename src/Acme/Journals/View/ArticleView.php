<?php

namespace Acme\Journals\View;

use Acme\Mvc\View;

class ArticleView extends View
{
    public function output($twig)
    {
        return $twig->render('article.html', array("Article" => $this->model->article));
    }
}