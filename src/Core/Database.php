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

    /**
     * FindAll - FETCH_OBJ / FETCH_ASSOC / FETCH_NUM 
     *
     * @param string $query
     * @param array $params
     * @return void
     */
    public function findAll(string $query, array $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_OBJ);;
    }

    /**
     * FindOne - FETCH_OBJ / FETCH_ASSOC / FETCH_NUM 
     *
     * @param string $query
     * @param array $params
     * @return void
     */
    public function findOne(string $query, array $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Insert / Update / Delete
     *
     * @param string $query
     * @param array $params
     * @return void
     */
    public function update(string $query, array $params = [])
    {
        $this->pdo->prepare($query)->execute($params);
    }

    /**
     * Run SQL query directly
     *
     * @param string $query
     * @return void
     */
    public function exec(string $query)
    {
        $this->pdo->exec($query);
    }
}