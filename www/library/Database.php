<?php

namespace Library;

use Medoo\Medoo;
use Dotenv\Dotenv;

class Database
{
    private static $instance = null;

    public static function getInstance() {
        Dotenv::createImmutable(__DIR__ . '/../')->load();
        if (self::$instance === null) {

            self::$instance = new Medoo([
                'database_type' => 'mysql',
                'database_name' => $_ENV['DB_NAME'],
                'server' 		=> $_ENV['DB_HOST'],
                'username' 		=> $_ENV['DB_USERNAME'],
                'password' 		=> $_ENV['DB_PASSWORD'],
                'prefix'        => $_ENV['DB_PREFIX']
            ]);

        }

        return self::$instance;
    }
}
