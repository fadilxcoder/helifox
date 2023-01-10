<?php

if (file_exists(__DIR__ . '/../vendor/autoload.php')) :
	require __DIR__ . '/../vendor/autoload.php';
else :
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Did you install the dependencies ? ☺';
	exit(1);
endif;

use App\Client;
use App\Core\Container;
use Dotenv\Dotenv;
use \Whoops\Run as Run;
use \Whoops\Handler\PrettyPageHandler as PrettyPageHandler;
use \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

# Debugging tools
$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler());
$whoops->register();

# Initialization
Dotenv::createImmutable(__DIR__ . '/../')->load();
$container = Container::init();
date_default_timezone_set($_ENV['TZ']);

try 
{
    $app = new Client($container);
    $app->execute();
} 
catch (NotFoundHttpException $e) 
{
    http_response_code($e->getStatusCode());
} 
catch (Exception $e) 
{
    dump($e);
}