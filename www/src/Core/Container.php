<?php

declare(strict_types=1);

namespace App\Core;

use DI\ContainerBuilder;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\Request;

class Container
{
    public static function init(): \DI\Container
    {
        $containerBuilder = new ContainerBuilder();
        $twigRepo = __DIR__ . '/../../' . $_ENV['TWIG_REPO'];
        
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
                ),
                Environment::class => \DI\autowire()->constructor(
                    new FilesystemLoader($twigRepo),
                    [
                        'debug' => (bool)($_ENV['DEBUG'] ?? false),
                        'cache' => false,
                    ]
                ),
                Request::class => \DI\factory(static function (): Request {
                    return Request::createFromGlobals();
                }),
            ]
        );

        return $containerBuilder->build();
    }
}
