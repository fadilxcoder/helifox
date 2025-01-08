<?php

namespace App\Controller;

use DateTime;
use App\Dto\User;
use App\Core\Controller;
use App\Repository\UsersRepository;
use ArrayIterator;

class UserController extends Controller
{
    private const USER_ID = 4;

    /**
     * $routes->addRoute('GET', '/user', [UserController::class, 'displayUser']);
     */
    public function displayUser(UsersRepository $usersRepository, User $user)
    {
        $result = (object) $usersRepository->getUser(self::USER_ID);

        $user->setId($result->id_user);
        $user->setUuid($result->uuid);
        $user->setUsername($result->username);
        $user->setName($result->name);
        $user->setLastLogin(new DateTime($result->last_login));

        echo json_encode([
            'HTTP' => 'OK - check chrome logger',
        ]);
    }

    /**
     * $routes->addRoute(['GET', 'POST'], '/users', [UserController::class, 'displayUsers']);
     */
    public function displayUsers(UsersRepository $usersRepository)
    {
        $results = (array) $usersRepository->getUsers();
        $ai = new ArrayIterator();

        foreach ($results as $result) {
            $user = new User();
            $user->setId($result->id_user);
            $user->setUuid($result->uuid);
            $user->setUsername($result->username);
            $user->setName($result->name);
            $user->setLastLogin(new DateTime($result->last_login));
            $ai->append($user);
        }

        dd($ai);
    }
}