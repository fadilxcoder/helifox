<?php

namespace App\Controller;

class HomeController
{
    public function __invoke()
    {
        echo 'invoke';
    }

    public function index($id)
    {
        echo "index - " . $id;
    }
}
