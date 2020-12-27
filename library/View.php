<?php

namespace Library;

use \League\Plates\Engine;

class View
{
    public function render($view, $vars = [])
    {
        $templates = new Engine('../views');
        echo $templates->render($view, $vars);
        exit;
    }
}
