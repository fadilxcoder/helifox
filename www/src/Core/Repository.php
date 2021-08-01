<?php

namespace App\Core;

use App\Core\Database;

class Repository
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
}