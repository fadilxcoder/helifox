<?php

declare(strict_types=1);

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
    public function displayUser(UsersRepository $usersRepository, User $user): void
    {
        $result = (object) $usersRepository->getUser(self::USER_ID);

        $user->setId($result->id_user);
        $user->setUuid($result->uuid);
        $user->setUsername($result->username);
        $user->setName($result->name);
        $user->setLastLogin(new DateTime($result->last_login));

        echo json_encode([
            'HTTP' => 'OK - check chrome logger',
        ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
    }

    /**
     * $routes->addRoute(['GET', 'POST'], '/users', [UserController::class, 'displayUsers']);
     */
    public function displayUsers(UsersRepository $usersRepository): void
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