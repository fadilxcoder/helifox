<?php

namespace Handler\Fixtures;

use \Library\Database as DbManager;
use Handler\Manager\UserManager;
use Ramsey\Uuid\Uuid;
// use Faker\Factory as Factory;
use Handler\DependencyInjection;

class DataFixtures
{
    private $faker;

    public function __construct()
    {
        $depInj = DependencyInjection::init();
        $this->faker = $depInj['DI_factory'];
    }

    public function init()
    {
        $userMgmt = new UserManager();

        DbManager::getInstance()->drop("users");

        // CREATE users
        echo " > CREATE 'users'  TABLE\n\r";

        DbManager::getInstance()
            ->create("users", [
                "id_user" => [
                    "INT",
                    "NOT NULL",
                    "AUTO_INCREMENT",
                    "PRIMARY KEY"
                ],
                "uuid" => [
                    "VARCHAR(255)",
                    "NOT NULL"
                ],
                "username" => [
                    "VARCHAR(45)",
                    "DEFAULT NULL"
                ],
                "name" => [
                    "VARCHAR(255)",
                    "DEFAULT NULL"
                ],
                "password" => [
                    "VARCHAR(255)",
                    "DEFAULT NULL"
                ],
                "last_login" => [
                    "datetime",
                    "DEFAULT NULL"
                ]
            ]);
        
        // INSERT users
        echo " > INSERT 'users' \n\r";

        DbManager::getInstance()
            ->insert("users", $this->populateUsers());

        echo " > ----------------------------------\n\r";
    }

    private function populateUsers()
    {
        $arr = [];
        $userMgmt = new UserManager();

        for ($i=0; $i<10; $i++) :
            $arr[] = [
                "id_user" => $i + 1,
                "uuid" => Uuid::uuid4()->toString(),
                "username" => $this->faker->companyEmail,
                "name" => $this->faker->name,
                "password" => $userMgmt->encryptUserPassword("admin"),
                "last_login" => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            ];
        endfor;
        
        return $arr;
    }
}
