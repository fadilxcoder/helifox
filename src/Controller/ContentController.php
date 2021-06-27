<?php

namespace App\Controller;

use App\Core\Controller;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends Controller
{
    public function show($id, Request $request, $slug, UsersRepository $usersRepository)
    {
        # $usersRepository->getUsers();
        # $user = $usersRepository->getUser(1);
        # $usersRepository->updateUser($user);
        # dump($usersRepository->getUser(rand(1, 25)), $id, $slug, $request->query->get('action'));
        
        return $this->render('content/index.html.twig', [
            'user' => $usersRepository->getUser(rand(1, 25)),
            'users' => $usersRepository->getUsers()
        ]);
    }
}