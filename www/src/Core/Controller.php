<?php

declare(strict_types=1);

namespace App\Core;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function __construct(
        protected Environment $twig,
        protected Twig $twigEnv
    ) {}

    public function render(string $view, array $parameters = []): void
    {
        $parameters['app'] = [
            'uri' => $this->twigEnv->appUri(),
            'name' => $this->twigEnv->appName(),
        ];

        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        echo $this->twig->render($view, $parameters);
    }

    public function redirectTo(string $url): void
    {
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header('Location: ' . $this->twigEnv->appUri() . $url);
    }

    protected function json(mixed $data, int $statusCode = 200): Response
    {
        return new Response(
            json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES),
            $statusCode,
            ['Content-Type' => 'application/json']
        );
    }
}