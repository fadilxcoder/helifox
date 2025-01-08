<?php

namespace App\Config;

use FastRoute\RouteCollector;
use App\Controller\{HomeController, ContentController, UserController};

class Router
{
    public static function config()
    {
        # Routes
        return \FastRoute\simpleDispatcher(function (RouteCollector $routes) {

            $routes->addRoute('GET', '/content/{id:\d+}/{slug:[a-zA-Z0-9-_&]+}[/{extra}]', [ContentController::class, 'show']);

            $routes->addRoute('GET', '/user', [UserController::class, 'displayUser']);

            $routes->addRoute(['GET', 'POST'], '/users', [UserController::class, 'displayUsers']);

            $routes->addRoute(['GET', 'POST'], '/[{extra}]', [HomeController::class, 'index']);
        });
    }
}