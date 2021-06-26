<?php

namespace App\Controller;

use App\Core\Controller;
use App\Repository\UsersRepository;

class ContentController extends Controller
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function show($id)
    {
        dump($this->usersRepository->getUsers());
        dump($this->usersRepository->getUser(7));

        $user = $this->usersRepository->getUser(1);
        $this->usersRepository->updateUser($user);

        echo "Content show ID - " . $id;
    }
}
