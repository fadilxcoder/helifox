<?php

namespace App\Controller\Error;

use App\Core\Controller;

class BadRequest extends Controller
{
    public static function NOT_FOUND()
    {
        http_response_code(404);
    }

    public static function METHOD_NOT_ALLOWED()
    {
        return http_response_code(405);
    }

    public static function UNKNOWN()
    {
        return http_response_code(500);
    }
}
