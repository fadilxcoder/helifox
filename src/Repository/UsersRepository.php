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
}