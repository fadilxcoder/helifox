<?php

namespace App\Controller;

use App\Core\Controller;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends Controller
{
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }


    public function show($id, Request $request, $slug)
    {
        # $this->usersRepository->getUsers();

        # $user = $this->usersRepository->getUser(1);
        # $this->usersRepository->updateUser($user);

        dump($this->usersRepository->getUser(rand(1, 25)), $id, $slug, $request->query->get('action'));
    }
}