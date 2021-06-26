<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Container;
use App\Commands\InsertUserCommand;

Dotenv::createImmutable(__DIR__ . '/../')->load();
$container = Container::init();
$app = new Silly\Application();

$app->useContainer($container, $injectWithTypeHint = true);

## Commands here ##

$app->command('users:populate', InsertUserCommand::class);

## EOF Commands ##

$app->run();