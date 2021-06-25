<?php

namespace App\Core;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use Twig\Loader\FilesystemLoader;
use \DI\ContainerBuilder as ContainerBuilder;
use App\Core\Database as Database;

class Container
{
    public static function init()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(
            [
                'database.name' => $_ENV['DB_NAME'],
                'database.host' => $_ENV['DB_HOST'], 
                'database.user' => $_ENV['DB_USERNAME'],
                'database.password' => $_ENV['DB_PASSWORD'],
                Database::class => \DI\autowire()->constructor(
                    \DI\get('database.name'),
                    \DI\get('database.host'),
                    \DI\get('database.user'),
                    \DI\get('database.password')
                )
            ]
        );
        $container = $containerBuilder->build();

        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $container->set(Environment::class, new Environment($loader));
        $container->set(Request::class, Request::createFromGlobals());

        return $container;
    }
}
