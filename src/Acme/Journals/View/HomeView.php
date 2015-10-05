<?php

namespace Acme\Journals\View;

use Acme\Journals\Model\AuthorListModel;
use Acme\Journals\Model\CategoryListModel;
use Acme\Journals\Model\TagListModel;
use Acme\Mvc\View;

class HomeView extends View
{
    protected $categoryListModel;
    protected $authorListModel;
    protected $tagListModel;

    public function __construct(CategoryListModel $m, AuthorListModel $a, TagListModel $t)
    {
        $this->categoryListModel = $m;
        $this->authorListModel = $a;
        $this->tagListModel = $t;
    }

    public function output($twig)
    {
        return $twig->render(
            'index.html',
            array(
                "Articles" => $this->model->findAll(),
                "Categories" => $this->categoryListModel->findAll(),
                "Authors" => $this->authorListModel->findAll(),
                "Tags" => $this->tagListModel->findAll()
            )
        );
    }
}