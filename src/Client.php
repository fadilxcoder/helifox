<?php

namespace App;

use App\ClientResolverInterface;
use DI\Container;
use Symfony\Component\HttpFoundation\Request;
use App\Config\Router;

class Client implements ClientResolverInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Container
     */
    private $container;


    public function __construct(Request $request, Container $container)
    {
        $this->request = $request;
        $this->container = $container;
    }

    public function execute()
    {
        $route = Router::config()->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

        switch ($route[0]) 
        {
            case \FastRoute\Dispatcher::NOT_FOUND:
                dump('404 Not found');
                break;

            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                dump('405 Method Not Allowed');
                break;

            case \FastRoute\Dispatcher::FOUND:
                $controller = $route[1];
                $parameters = $route[2];
                $this->container->call($controller, $parameters);
                break;
        }
    }
}