<?php

namespace App\Commands;

use App\Repository\UsersRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserCommand
{
    private $usersRepository;

    public function __construct(
        UsersRepository $usersRepository
    ) {
        $this->usersRepository = $usersRepository;
    }

    public function __invoke(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("\nBeginning query execution... \n");

        $value = $input->getArgument('value');

        if(empty($value)) {
            $output->writeln('Missing argument !');
            return;
        }

        $result = $this->usersRepository->getUser($value);

        if(empty($result)) {
            $output->writeln('Not found !');
            return;
        }

        dump($result);

        $output->writeln("\nQuery executed ! \n");
    }
}
