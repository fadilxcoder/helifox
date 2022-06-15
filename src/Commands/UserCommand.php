<?php

namespace App\Commands;

use App\Services\UserService;
use Faker\Factory as Factory;
use App\Repository\UsersRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserCommand
{
    private $usersRepository, $userService;

    public function __construct(
        UsersRepository $usersRepository, 
        UserService $userService
    ) {
        $this->usersRepository = $usersRepository;
        $this->userService = $userService;
    }

    public function __invoke(InputInterface $input, OutputInterface $output)
    {
        $action = $input->getArgument('value');

        switch ($action)
        {
            case 'up':
                $this->usersRepository->createTable();
                $output->writeln('Table `hfx_users` created !');
                break;
            case 'down':
                $this->usersRepository->dropTable();
                $output->writeln('Table `hfx_users` deleted !');
                break;
            case 'seed':
                $this->populateTable();
                $output->writeln('`hfx_users` populated.');
                break;
            default:
                $output->writeln('Missing arguments !');
                break;
        }
    }

    private function populateTable()
    {
        $faker = Factory::create();

        $this->usersRepository->cleanTable();

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
    }
}
