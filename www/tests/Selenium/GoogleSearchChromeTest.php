<?php

namespace App\Tests\Selenium;

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Firefox\FirefoxDriver;
use Facebook\WebDriver\Firefox\FirefoxProfile;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class GoogleSearchChromeTest extends TestCase
{
    protected $webDriver;

    public function setUp(): void
    {
        $capabilities = $this->build_chrome_capabilities();
        $this->webDriver = RemoteWebDriver::create('http:///172.18.0.3:4444/', $capabilities);
    }

    public function build_chrome_capabilities()
    {
        $capabilities = DesiredCapabilities::chrome();

        return $capabilities;
    }

    /*
    * @test
    */ 
    public function test_searchTextOnGoogle()
    {
        $this->webDriver->get("http://172.18.0.7/");
        print $this->webDriver->getTitle();
        $this->assertEquals('Welcome | HFX', $this->webDriver->getTitle());
    }

    public function tearDown(): void
    {
        $this->webDriver->quit();
    }
}
