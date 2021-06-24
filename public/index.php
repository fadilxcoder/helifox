<?php

if (file_exists(__DIR__.'/../vendor/autoload.php')) :
	require __DIR__.'/../vendor/autoload.php';
else :
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Did you install the dependencies ? ☺';
	exit(1); // EXIT_ERROR
endif;

# Debugging tools
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require __DIR__.'/../library/Error.php';
require __DIR__.'/../library/Core.php';
require __DIR__.'/../library/Controller.php';
require __DIR__.'/../library/Model.php';
require __DIR__.'/../library/View.php';
require __DIR__.'/../library/Database.php';
require __DIR__.'/../configuration/settings.php';

use \Library\Core as Core;

switch (ENVIRONMENT)
{
	case 'development':
		ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
	break;

	case 'production':
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}

$core = new Core;
