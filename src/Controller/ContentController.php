<?php

namespace App\Controller;

use App\Core\Controller;
use App\Repository\UsersRepository;
use App\Command\CreateUserCommand;

class ContentController extends Controller
{
    private $usersRepository, $createUserCommand;

    public function __construct(UsersRepository $usersRepository, CreateUserCommand $createUserCommand)
    {
        $this->usersRepository = $usersRepository;
        $this->createUserCommand = $createUserCommand;
    }

    public function show($id)
    {
        dump($this->usersRepository->getUsers());
        dump($this->usersRepository->getUser(7));

        $user = $this->usersRepository->getUser(1);
        $this->usersRepository->updateUser($user);
        $this->createUserCommand->execute();

        echo "Content show ID - " . $id;
    }
}
