<?php

namespace App\Repository;

use App\Core\Repository;

class UsersRepository extends Repository
{
    public function getUsers()
    {
        $query = '
            SELECT 
                u.*
            FROM 
                `hfx_users` u
            WHERE
                u.uuid LIKE :value
            ORDER BY
                u.id_user ASC
        ';

        return $this->db->findAll($query, [
            'value' => '%f%',
        ]);
    }

    public function getUser($id)
    {
        $query = '
            SELECT 
                u.*
            FROM 
                `hfx_users` u
            WHERE
                u.id_user = :id
        ';

        return $this->db->findOne($query, [
            'id' => $id,
        ]);
    }

    public function updateUser($user)
    {
        $query = '
            UPDATE 
                `hfx_users` 
            SET 
                last_login = :last_login 
            WHERE 
                id_user = :id_user
        ';

        $this->db->update($query, [
            'id_user' => $user->id_user,
            'last_login' => (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
    }

    public function insertUser(array $user)
    {
        $query = '
            INSERT INTO 
                `hfx_users` (
                    uuid,
                    username,
                    name,
                    password,
                    last_login
                )
            VALUES 
                (
                    :uuid,
                    :username,
                    :name,
                    :password,
                    :last_login
                )
        ';

        $this->db->update($query, [
            'uuid' => $user['uuid'],
            'username' => $user['username'],
            'name' => $user['name'],
            'password' => $user['password'],
            'last_login' => $user['last_login'],
        ]);
    }

    public function createTable()
    {
        $query = '
            DROP TABLE IF EXISTS `hfx_users`;
            CREATE TABLE `hfx_users` (
            `id_user` int(11) NOT NULL AUTO_INCREMENT,
            `uuid` varchar(255) NOT NULL,
            `username` varchar(45) DEFAULT NULL,
            `name` varchar(255) DEFAULT NULL,
            `password` varchar(255) DEFAULT NULL,
            `last_login` datetime DEFAULT NULL,
            PRIMARY KEY (`id_user`)
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
        ';

        $this->db->exec($query);
    }

    public function cleanTable()
    {
        $query = '
            TRUNCATE `hfx_users`;
        ';

        $this->db->exec($query);
    }

    public function dropTable()
    {
        $query = '
            DROP TABLE IF EXISTS `hfx_users`;
        ';

        $this->db->exec($query);
    }
}