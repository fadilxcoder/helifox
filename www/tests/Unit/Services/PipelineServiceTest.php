<?php

declare(strict_types=1);

namespace App\Tests\Unit\Services;

use App\Services\PipelineService;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for PipelineService
 * 
 * Tests the CI/CD pipeline service functionality
 */
class PipelineServiceTest extends TestCase
{
    private PipelineService $service;

    protected function setUp(): void
    {
        $this->service = new PipelineService();
    }

    public function testServiceCanBeInstantiated(): void
    {
        $this->assertInstanceOf(PipelineService::class, $this->service);
    }

    public function testInitialStatusIsReady(): void
    {
        $this->assertEquals('ready', $this->service->getStatus());
    }

    public function testStatusCanBeChanged(): void
    {
        $this->service->setStatus('running');
        $this->assertEquals('running', $this->service->getStatus());
    }

    public function testStatusCannotBeEmpty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->service->setStatus('');
    }

    public function testTestCanBeRun(): void
    {
        $result = $this->service->runTest('example_test');
        $this->assertTrue($result);
    }

    public function testTestCountIncreases(): void
    {
        $this->assertEquals(0, $this->service->getTestCount());
        
        $this->service->runTest('test_1');
        $this->assertEquals(1, $this->service->getTestCount());
        
        $this->service->runTest('test_2');
        $this->assertEquals(2, $this->service->getTestCount());
    }

    public function testResultsAreStored(): void
    {
        $this->service->runTest('test_one');
        $this->service->runTest('test_two');
        
        $results = $this->service->getResults();
        $this->assertCount(2, $results);
        $this->assertArrayHasKey('test_one', $results);
        $this->assertArrayHasKey('test_two', $results);
    }

    public function testAllTestsPassedWhenNoResults(): void
    {
        $this->assertFalse($this->service->allTestsPassed());
    }

    public function testAllTestsPassedWithPassingTests(): void
    {
        $this->service->runTest('test_1');
        $this->service->runTest('test_2');
        
        $this->assertTrue($this->service->allTestsPassed());
    }

    public function testResetClearsState(): void
    {
        $this->service->setStatus('running');
        $this->service->runTest('test_1');
        
        $this->assertEquals('running', $this->service->getStatus());
        $this->assertEquals(1, $this->service->getTestCount());
        
        $this->service->reset();
        
        $this->assertEquals('ready', $this->service->getStatus());
        $this->assertEquals(0, $this->service->getTestCount());
    }

    public function testPhpVersionValidation(): void
    {
        // Test with current PHP version (should pass)
        $this->assertTrue($this->service->validatePhpVersion('7.0'));
        $this->assertTrue($this->service->validatePhpVersion('8.0'));
        $this->assertTrue($this->service->validatePhpVersion('8.4'));
    }

    public function testGetSummary(): void
    {
        $this->service->runTest('test_1');
        $summary = $this->service->getSummary();
        
        $this->assertStringContainsString('Pipeline Status', $summary);
        $this->assertStringContainsString('Tests Run', $summary);
        $this->assertStringContainsString('All Passed', $summary);
    }
}
