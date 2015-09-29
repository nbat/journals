<?php

namespace Acme\Journals\View;

use Acme\Mvc\View;

class HomeView extends View
{
    public function output($twig)
    {
        return $twig->render('index.html', array("Articles" => $this->_model->findAll()));
    }
}