<?php

namespace App\Controller;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'a' => 132465,
            'xxx' => false,
        ]);
    }
}
