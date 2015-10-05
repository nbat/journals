<?php

namespace Acme\Journals\View;

use Acme\Journals\Model\AuthorListModel;
use Acme\Journals\Model\CategoryListModel;
use Acme\Mvc\View;

class HomeView extends View
{
    protected $categoryListModel;
    protected $authorListModel;

    public function __construct(CategoryListModel $m, AuthorListModel $a)
    {
        $this->categoryListModel = $m;
        $this->authorListModel = $a;
    }

    public function output($twig)
    {
        return $twig->render(
            'index.html',
            array(
                "Articles" => $this->model->findAll(),
                "Categories" => $this->categoryListModel->findAll(),
                "Authors" => $this->authorListModel->findAll()
            )
        );
    }
}