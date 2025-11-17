<?php

declare(strict_types=1);

namespace App\Core;

class Database
{
    private \PDO $pdo;

    public function __construct(string $dbName, string $dbHost, string $dbUser, string $dbPassword)
    {
        try {
            $dsn = sprintf('mysql:dbname=%s;host=%s;charset=utf8mb4', $dbName, $dbHost);
            $this->pdo = new \PDO(
                $dsn,
                $dbUser,
                $dbPassword,
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (\PDOException $e) {
            throw new \RuntimeException('Database connection failed: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Fetch all records
     *
     * @param string $query
     * @param array $params
     * @return array
     */
    public function findAll(string $query, array $params = []): array
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_OBJ) ?: [];
    }

    /**
     * Fetch one record
     *
     * @param string $query
     * @param array $params
     * @return object|null
     */
    public function findOne(string $query, array $params = []): ?object
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        $result = $stmt->fetch(\PDO::FETCH_OBJ);
        return $result ?: null;
    }

    /**
     * Insert / Update / Delete
     *
     * @param string $query
     * @param array $params
     * @return int
     */
    public function update(string $query, array $params = []): int
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    /**
     * Run SQL query directly
     *
     * @param string $query
     * @return int
     */
    public function exec(string $query): int
    {
        return $this->pdo->exec($query);
    }

    /**
     * Get last inserted ID
     *
     * @return string
     */
    public function lastInsertId(): string
    {
        return $this->pdo->lastInsertId();
    }
}