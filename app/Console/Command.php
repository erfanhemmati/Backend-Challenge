<?php

require __DIR__ . '/../../vendor/autoload.php';

use Src\Services\UserService;

$userService = new UserService();
$userService->populateUsers(10);

print_r($userService->getUsers());
