<?php

declare(strict_types=1);

namespace App;

use DI\Container;
use App\Config\Router;
use FastRoute\Dispatcher;

class Client implements ClientResolverInterface
{
    public function __construct(private Container $container) {}

    public function execute(): void
    {
        $route = Router::config()->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

        match ($route[0]) {
            Dispatcher::NOT_FOUND => $this->container->call('App\\Core\\Error\\BadRequest::NOT_FOUND'),
            Dispatcher::METHOD_NOT_ALLOWED => $this->container->call('App\\Core\\Error\\BadRequest::METHOD_NOT_ALLOWED'),
            Dispatcher::FOUND => $this->container->call($route[1], $route[2]),
            default => $this->container->call('App\\Core\\Error\\BadRequest::UNKNOWN'),
        };
    }
}