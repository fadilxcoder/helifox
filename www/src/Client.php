<?php

namespace App;

use App\ClientResolverInterface;
use DI\Container;
use App\Config\Router;

class Client implements ClientResolverInterface
{
    /**
     * @var Container
     */
    private $container;


    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function execute()
    {
        $route = Router::config()->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

        switch ($route[0]) 
        {
            case \FastRoute\Dispatcher::NOT_FOUND:
                $this->container->call('App\\Controller\\Error\\BadRequest::NOT_FOUND');
                break;

            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $this->container->call('App\\Controller\\Error\\BadRequest::METHOD_NOT_ALLOWED');
                break;

            case \FastRoute\Dispatcher::FOUND:
                $controller = $route[1];
                $parameters = $route[2];
                $this->container->call($controller, $parameters);
                break;
            
            default:
                $this->container->call('App\\Controller\\Error\\BadRequest::UNKNOWN');
                break;
        }
    }
}