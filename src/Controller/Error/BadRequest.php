<?php

namespace App\Controller\Error;

class BadRequest
{
    public function notFound()
    {
        echo 'page not found !';
    }

    public function methodNotAllowed()
    {
        echo 'methid not allowwd'
    }
}
