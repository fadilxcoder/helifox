<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    private const LP = 'hfx/lp.html.twig';
    private const HP = 'home/index.html.twig';

    /**
     * $routes->addRoute('GET', '/[{extra}]', [HomeController::class, 'index']);
     */
    public function index(Request $request): void
    {
        if ($request->isMethod('POST')) {
            dd($request->request->all());
        }
        $this->render(self::LP, [
            'txt_1' => 132465,
            'txt_2' => 'DEV',
        ]);
    }
}
