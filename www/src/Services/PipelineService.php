<?php

declare(strict_types=1);

namespace App\Service;

/**
 * Pipeline service to demonstrate CI/CD functionality
 * 
 * This service is used to verify:
 * - PHPStan type checking
 * - PHPCS code style compliance
 * - PHPUnit test execution
 */
class PipelineService
{
    private string $status;
    private int $testCount;
    private array $results;

    /**
     * Constructor with type declarations
     */
    public function __construct()
    {
        $this->status = 'ready';
        $this->testCount = 0;
        $this->results = [];
    }

    /**
     * Get the current pipeline status
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set pipeline status with type safety
     */
    public function setStatus(string $status): void
    {
        if (empty($status)) {
            throw new \InvalidArgumentException('Status cannot be empty');
        }

        $this->status = $status;
    }

    /**
     * Run a single test with return type
     */
    public function runTest(string $testName): bool
    {
        $this->testCount++;
        $result = true;
        
        $this->results[$testName] = $result;
        
        return $result;
    }

    /**
     * Get test count
     */
    public function getTestCount(): int
    {
        return $this->testCount;
    }

    /**
     * Get all results
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * Check if all tests passed
     */
    public function allTestsPassed(): bool
    {
        if (empty($this->results)) {
            return false;
        }

        foreach ($this->results as $result) {
            if (!$result) {
                return false;
            }
        }

        return true;
    }

    /**
     * Reset pipeline state
     */
    public function reset(): void
    {
        $this->status = 'ready';
        $this->testCount = 0;
        $this->results = [];
    }

    /**
     * Validate PHP version requirement
     */
    public function validatePhpVersion(string $minimumVersion): bool
    {
        return version_compare(PHP_VERSION, $minimumVersion, '>=');
    }

    /**
     * Get pipeline summary
     */
    public function getSummary(): string
    {
        return sprintf(
            'Pipeline Status: %s | Tests Run: %d | All Passed: %s',
            $this->status,
            $this->testCount,
            $this->allTestsPassed() ? 'Yes' : 'No'
        );
    }
}
