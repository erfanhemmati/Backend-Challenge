<?php

namespace Src\Services;

use Faker\Factory as Faker;
use Src\Models\User;

class UserService
{
    public $users = [];

    public function populateUsers($num)
    {
        $faker = Faker::create();

        for ($i = 0; $i < $num; $i++) {
            $this->users[] = new User($i, $faker->name, $faker->randomFloat(2, 100, 1000));
        }
    }

    public function getUsers()
    {
        return $this->users;
    }
}