<?php

declare(strict_types=1);

if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    http_response_code(503);
    echo 'Did you install the dependencies? Run: composer install';
    exit(1);
}

require __DIR__ . '/../vendor/autoload.php';

use App\Client;
use App\Core\Container;
use Dotenv\Dotenv;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// Error handling
$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler());
$whoops->register();

// Initialization
Dotenv::createImmutable(__DIR__ . '/../')->load();
$container = Container::init();
date_default_timezone_set($_ENV['TZ'] ?? 'UTC');

try {
    $app = new Client($container);
    $app->execute();
} catch (NotFoundHttpException $e) {
    http_response_code($e->getStatusCode());
} catch (Throwable $e) {
    if ($_ENV['DEBUG'] ?? false) {
        throw $e;
    }
    http_response_code(500);
    echo 'Internal Server Error';
}