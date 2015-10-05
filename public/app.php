<?php

use Acme\DI\DI;
use Acme\DI\Rule;
use Acme\Mvc\FrontController;
use Acme\Mvc\Route;
use Acme\Mvc\RouteCollection;
use Acme\Mvc\Router;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../etc/dbconfig.php';


$routes = new RouteCollection();
$routes->attach(
    new Route(
        '/',
        array(
            '_controller' => '\\Acme\\Journals\\Controller\\HomeController::show',
            '_model' => '\\Acme\\Journals\\Model\\ArticleListModel',
            '_view' => '\\Acme\\Journals\\View\\HomeView'
        )
    )
);
$route = new Route(
    '/artykul/:article_slug',
    array(
        '_controller' => '\\Acme\\Journals\\Controller\\ArticleController::show',
        '_model' => '\\Acme\\Journals\\Model\\ArticleModel',
        '_view' => '\\Acme\\Journals\\View\\ArticleView'
    )
);
$route->setFilters(array(':article_slug' => '([a-zA-Z\-0-9]+)'));
$routes->attach($route);

$appRouter = new Router($routes);

$di = new DI();

$rule = new Rule();
$rule->shared = true;
$rule->constructParams = [$host, $database, $port, $username, $password];
$di->addRule('\\Acme\\Service\\MysqlService', $rule);


$frontController = new FrontController($di, $appRouter);

$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader);
echo $frontController->output($twig);