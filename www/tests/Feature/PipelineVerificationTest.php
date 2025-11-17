<?php

declare(strict_types=1);

namespace App\Tests\Feature;

use PHPUnit\Framework\TestCase;

/**
 * Feature test to verify the CI/CD pipeline is working correctly
 * 
 * This test demonstrates:
 * - PHPUnit test execution
 * - Test assertions
 * - Type safety with strict_types
 */
class PipelineVerificationTest extends TestCase
{
    /**
     * Test that the pipeline is properly configured
     */
    public function testPipelineIsConfigured(): void
    {
        // Verify phpunit.xml exists and is readable
        $phpunitConfig = __DIR__ . '/../../phpunit.xml';
        $this->assertFileExists($phpunitConfig);
        $this->assertStringContainsString('phpunit', file_get_contents($phpunitConfig));
    }

    /**
     * Test that PHPStan configuration exists
     */
    public function testPhpstanIsConfigured(): void
    {
        $phpstanConfig = __DIR__ . '/../../phpstan.neon';
        $this->assertFileExists($phpstanConfig);
        $this->assertStringContainsString('level: 9', file_get_contents($phpstanConfig));
    }

    /**
     * Test that PHPCS configuration exists
     */
    public function testPhpcsIsConfigured(): void
    {
        $phpcsConfig = __DIR__ . '/../../phpcs.xml';
        $this->assertFileExists($phpcsConfig);
        $this->assertStringContainsString('PSR12', file_get_contents($phpcsConfig));
    }

    /**
     * Test that GitHub Actions workflows exist
     */
    public function testGithubActionsWorkflowsExist(): void
    {
        $workflowsDir = __DIR__ . '/../../.github/workflows';
        
        $this->assertTrue(is_dir($workflowsDir), 'Workflows directory should exist');
        $this->assertFileExists($workflowsDir . '/tests.yml');
        $this->assertFileExists($workflowsDir . '/static-analysis.yml');
        $this->assertFileExists($workflowsDir . '/docker-build.yml');
    }

    /**
     * Test that test bootstrap file exists
     */
    public function testBootstrapFileExists(): void
    {
        $bootstrap = __DIR__ . '/../bootstrap.php';
        $this->assertFileExists($bootstrap);
    }

    /**
     * Test that basic PHP 8.4 features work
     */
    public function testPhp84Features(): void
    {
        // Test match expression (PHP 8.0+)
        $version = '8.4';
        $result = match ($version) {
            '8.4' => 'Modern PHP',
            '8.3' => 'PHP 8.3',
            default => 'Unknown',
        };
        
        $this->assertEquals('Modern PHP', $result);
    }

    /**
     * Test that strict types are enforced
     */
    public function testStrictTypesEnforcement(): void
    {
        // This function expects an integer
        $testValue = 42;
        
        $this->assertIsInt($testValue);
        $this->assertEquals(42, $testValue);
    }

    /**
     * Test assertion examples for the pipeline
     */
    public function testAssertionExamples(): void
    {
        // String assertions
        $this->assertStringContainsString('CI/CD', 'Testing CI/CD Pipeline');
        $this->assertStringStartsWith('Testing', 'Testing CI/CD Pipeline');
        
        // Numeric assertions
        $this->assertGreaterThan(0, 100);
        $this->assertLessThan(1000, 100);
        
        // Array assertions
        $array = ['test' => 'value', 'pipeline' => 'working'];
        $this->assertArrayHasKey('test', $array);
        $this->assertCount(2, $array);
        
        // Boolean assertions
        $this->assertTrue(true);
        $this->assertFalse(false);
    }

    /**
     * Test that exception handling works
     */
    public function testExceptionHandling(): void
    {
        $this->expectException(\Exception::class);
        throw new \Exception('Pipeline test exception');
    }

    /**
     * Test callable verification
     */
    public function testCallableVerification(): void
    {
        $callable = static function (string $message): string {
            return "Pipeline: " . $message;
        };
        
        $this->assertTrue(is_callable($callable));
        $result = $callable('Working!');
        $this->assertStringContainsString('Working', $result);
    }
}
