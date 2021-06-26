<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Repository\UsersRepository;

class CreateUserCommand extends Command
{
    // protected static $defaultName = 'app:create-user';

    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        // parent::__construct();
    }

    public function configure(): void
    {
        $this
            ->setDescription('Creates a new user.')
            ->setHelp('This command allows you to create a user...')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        // $userRepo = new UsersRepository();
        $this->usersRepository->insertUser();
        $output->write('user created !');

        return Command::SUCCESS;
    }
}