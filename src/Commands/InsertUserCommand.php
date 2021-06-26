<?php

namespace App\Commands;

use Symfony\Component\Console\Output\OutputInterface;
use App\Repository\UsersRepository;
use Faker\Factory as Factory;
use App\Services\UserService;

class InsertUserCommand
{
    private $usersRepository, $userService;

    public function __construct(
        UsersRepository $usersRepository, 
        UserService $userService
    ) {
        $this->usersRepository = $usersRepository;
        $this->userService = $userService;
    }

    public function __invoke(OutputInterface $output)
    {
        $faker = Factory::create();

        for ($i=0; $i<25; $i++) :
            $this->usersRepository->insertUser(
                [
                    "uuid" => $faker->uuid,
                    "username" => $faker->companyEmail,
                    "name" => $faker->name,
                    "password" => $this->userService->encryptUserPassword("admin"),
                    "last_login" => $faker->date($format = 'Y-m-d', $max = 'now'),
                ]
            );
        endfor;

        $output->writeln('users populated.');
    }
}

