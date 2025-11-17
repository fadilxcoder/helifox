<?php

declare(strict_types=1);

namespace App\Tests\Unit\Core;

use App\Core\Twig;
use PHPUnit\Framework\TestCase;

class TwigTest extends TestCase
{
    private Twig $twig;

    protected function setUp(): void
    {
        // Set environment variables for testing
        $_ENV['APP_URL'] = 'http://test.local/';
        $_ENV['APP_NAME'] = 'Test App';

        $this->twig = new Twig();
    }

    public function testAppUriReturnsString(): void
    {
        $result = $this->twig->appUri();
        $this->assertIsString($result);
    }

    public function testAppUriReturnsCorrectValue(): void
    {
        $result = $this->twig->appUri();
        $this->assertEquals('http://test.local/', $result);
    }

    public function testAppNameReturnsString(): void
    {
        $result = $this->twig->appName();
        $this->assertIsString($result);
    }

    public function testAppNameReturnsCorrectValue(): void
    {
        $result = $this->twig->appName();
        $this->assertEquals('Test App', $result);
    }

    public function testAppUriIsNotEmpty(): void
    {
        $result = $this->twig->appUri();
        $this->assertNotEmpty($result);
    }

    public function testAppNameIsNotEmpty(): void
    {
        $result = $this->twig->appName();
        $this->assertNotEmpty($result);
    }
}
