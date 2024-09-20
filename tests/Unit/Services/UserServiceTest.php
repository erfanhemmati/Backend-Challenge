<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use Src\Services\UserService;

class UserServiceTest extends TestCase
{
    public function testUserPopulation()
    {
        $userService = new UserService();
        $userService->populateUsers(10);

        $this->assertCount(10, $userService->getUsers());
    }

    // TODO implement other test case scenarios
}