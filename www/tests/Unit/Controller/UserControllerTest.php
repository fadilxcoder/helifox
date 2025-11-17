<?php

declare(strict_types=1);

namespace App\Tests\Unit\Controller;

use App\Controller\UserController;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    public function testUserControllerCanBeInstantiated(): void
    {
        $this->markTestIncomplete('UserController requires dependencies');
    }

    public function testDisplayUserMethodExists(): void
    {
        $this->assertTrue(method_exists(UserController::class, 'displayUser'));
    }

    public function testDisplayUsersMethodExists(): void
    {
        $this->assertTrue(method_exists(UserController::class, 'displayUsers'));
    }

    public function testDisplayUserMethodIsCallable(): void
    {
        $this->assertTrue(is_callable([UserController::class, 'displayUser']));
    }

    public function testDisplayUsersMethodIsCallable(): void
    {
        $this->assertTrue(is_callable([UserController::class, 'displayUsers']));
    }

    public function testDisplayUserMethodReturnsVoid(): void
    {
        $reflection = new \ReflectionMethod(UserController::class, 'displayUser');
        $returnType = (string) $reflection->getReturnType();
        $this->assertEquals('void', $returnType);
    }

    public function testDisplayUsersMethodReturnsVoid(): void
    {
        $reflection = new \ReflectionMethod(UserController::class, 'displayUsers');
        $returnType = (string) $reflection->getReturnType();
        $this->assertEquals('void', $returnType);
    }

    public function testUserIdConstantIsSet(): void
    {
        $reflection = new \ReflectionClass(UserController::class);
        $this->assertTrue($reflection->hasConstant('USER_ID'));
    }

    public function testUserIdConstantValue(): void
    {
        $reflection = new \ReflectionClass(UserController::class);
        $this->assertEquals(4, $reflection->getConstant('USER_ID'));
    }
}
