<?php

namespace App\Config;

use FastRoute\RouteCollector;
use App\Controller\{HomeController, ContentController};

class Router
{
    public static function config()
    {
        return \FastRoute\simpleDispatcher(function (RouteCollector $routes) {
            $routes->addRoute('GET', '/', [HomeController::class, 'index']);
            $routes->addRoute('GET', '/content/{id:\d+}/{slug:[a-zA-Z0-9-_&]+}[/{extra}]', [ContentController::class, 'show']);
        });
    }
}