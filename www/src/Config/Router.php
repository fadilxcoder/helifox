<?php

namespace App\Config;

use FastRoute\RouteCollector;
use App\Controller\{HomeController, ContentController, UserController, CacheController};

class Router
{
    public static function config()
    {
        # Routes
        return \FastRoute\simpleDispatcher(function (RouteCollector $routes) {
            $routes->addRoute('GET', '/content/{id:\d+}/{slug:[a-zA-Z0-9-_&]+}[/{extra}]', [ContentController::class, 'show']);
            $routes->addRoute('GET', '/user', [UserController::class, 'displayUser']);
            $routes->addRoute('GET', '/users', [UserController::class, 'displayUsers']);
            $routes->addRoute(['GET', 'POST'], '/memcache-gui', [CacheController::class, 'index']);
            $routes->addRoute('GET', '/[{extra}]', [HomeController::class, 'index']);
        });
    }
}