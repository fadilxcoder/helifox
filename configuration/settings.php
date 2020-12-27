<?php

use Dotenv\Dotenv;

Dotenv::createImmutable(__DIR__ . '/../')->load();

# Define the base url of the project
define('URL', $_ENV['APP_URL']);

# DEFINE ENVIRONMENT, Allowed environments variables : development / production
define('ENVIRONMENT',  $_ENV['ENVIRONMENT']);

# SET TIMEZONE DECLARATION
date_default_timezone_set($_ENV['TZ']);

# Customs

define('AUTHOR', $_ENV['AUTHOR']);
