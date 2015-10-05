<?php

namespace Acme\Journals\Controller;

use Acme\Mvc\Controller;
use Exception;

class ArticleController extends Controller
{
    public function show($params)
    {
        if (empty($this->model->findBySlug($params['article_slug']))) {
            throw new Exception(sprintf('Article with the slug %s not found', $params['article_slug']));
        }
    }
}