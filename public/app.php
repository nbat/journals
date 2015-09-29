<?php

require __DIR__ . '/../vendor/autoload.php';

use Acme\Mvc\FrontController;
use Acme\Mvc\Route;
use Acme\Mvc\Router;

$appRouter = new Router();
$appRouter->addRoute(new Route('home', '\\Acme\\Journals\\Model\\ArticleListModel', '\\Acme\\Journals\\View\\HomeView', '\\Acme\\Journals\\Controller\\HomeController'));

$frontController = new FrontController(
    $appRouter,
    isset($_GET['route']) ? $_GET['route'] : $_SERVER['REQUEST_URI'],
    isset($_GET['action']) ? $_GET['action'] : null
);

$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader);
echo $frontController->output($twig);