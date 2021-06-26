<?php

namespace App\Services;

class UserService
{
    public function encryptUserPassword(String $password) 
    {
        return hash('sha512', $password);
    }
}