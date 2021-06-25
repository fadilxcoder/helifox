<?php

namespace App\Core;

class Database
{
    private $pdo;

    public function __construct(string $dbName, string $dbHost, string $dbUser, string $dbPassword)
    {
        try {
            $this->pdo = new \PDO("mysql:dbname=$dbName;host=$dbHost", $dbUser, $dbPassword);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }


    // public function find(string $query, array $params = [])
    // {
    //     $stmt = $this->pdo->prepare($query);
    //     $stmt->execute($params);

    //     return $stmt->fetch( \PDO::FETCH_ASSOC);
    // }

    // public function update(string $query, array $params = [])
    // {
    //     $this->pdo->prepare($query)->execute($params);
    // }
}