<?php

declare(strict_types=1);

/*
 * This file is part of the HFX Framework tests.
 */

// Load composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv->load();
}

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

// Define test constants
if (!defined('PROJECT_ROOT')) {
    define('PROJECT_ROOT', __DIR__ . '/..');
}

if (!defined('TEST_ROOT')) {
    define('TEST_ROOT', __DIR__);
}
