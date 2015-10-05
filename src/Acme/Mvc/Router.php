<?php

namespace Acme\Mvc;

class Router
{
    private $routes = array();

    public function __construct(RouteCollection $routes)
    {
        $this->setRoutes($routes);
    }

    public function Match(array $post, array $server)
    {
        $method = (
            isset($post['_method'])
            && $post['_method'] = strtoupper($post['_method'])
                && in_array($post['_method'], array('PUT', 'DELETE'))
        ) ? $post['_method'] : $server['REQUEST_METHOD'];

        $url = $server['REQUEST_URI'];

        if (($pos = strpos($url, '?')) !== false) {
            $url = substr($url, 0, $pos);
        }

        return $this->matchUrl($url, $method);
    }

    protected function matchUrl($url, $method = 'GET')
    {
        foreach ($this->getRoutes()->all() as $route) {
            // Compare methods
            if (!in_array($method, $route->getMethods())) {
                continue;
            }
            // Compare url
            if (!preg_match("@^" . $route->getRegex() . "*$@i", $url, $matches)) {
                continue;
            }
            $params = array();
            if (preg_match_all("/:([\w-%]+)/", $route->getUrl(), $argument_keys)) {
                $argument_keys = $argument_keys[1];
                foreach ($argument_keys as $key => $name) {
                    if (isset($matches[$key + 1])) {
                        $params[$name] = $matches[$key + 1];
                    }
                }
            }
            $route->setActionParams($params);
            return $route;
        }
        return new Route("/",
            array(
                '_controller' => '\\Acme\\Journals\\Controller\\HomeController::show',
                '_model' => '\\Acme\\Journals\\Model\\ArticleListModel',
                '_view' => '\\Acme\\Journals\\View\\HomeView'
            ));
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function setRoutes(RouteCollection $routes)
    {
        $this->routes = $routes;
    }
}