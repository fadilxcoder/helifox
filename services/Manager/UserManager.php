<?php

namespace Handler\Manager;

use \Library\Database;
use Ramsey\Uuid\Uuid;

class UserManager
{
    public function encryptUserPassword(String $password) 
    {
        $encryptPassword = hash('sha512', $password);
        
        return $encryptPassword;
    }
}
