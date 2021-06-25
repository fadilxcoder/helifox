<?php

namespace App\Config;

use FastRoute\RouteCollector;

class Router
{
    public static function config()
    {
        return \FastRoute\simpleDispatcher(function (RouteCollector $routes) {
            $routes->addRoute('GET', '/', 'App\Controller\HomeController');
            $routes->addRoute('POST', '/article/{id}', ['App\Controller\HomeController', 'index']);
        });
    }
}