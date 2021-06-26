<?php

namespace App\Controller;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'txt_1' => 132465,
            'txt_2' => 'DEV',
        ]);
    }
}
