<?php

namespace App\Controller;

use App\Core\Controller;

class HomeController extends Controller
{
    private const LP = 'hfx/lp.html.twig';

    private const HP = 'home/index.html.twig';

    public function index()
    {
        return $this->render(self::LP, [
            'txt_1' => 132465,
            'txt_2' => 'DEV',
        ]);
    }
}
