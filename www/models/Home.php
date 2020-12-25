<?php

namespace Models;

use \Library\Database as DB;

class Home
{

    public function getAll() 
    {
        $data = DB::getInstance()->select('users', "*" );
        return $data;
    }

}
