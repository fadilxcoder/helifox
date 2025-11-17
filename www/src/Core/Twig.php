<?php

declare(strict_types=1);

namespace App\Core;

class Twig
{
    public function appUri(): string
    {
        return $_ENV['APP_URL'];
    }

    public function appName(): string
    {
        return $_ENV['APP_NAME'];
    }
}