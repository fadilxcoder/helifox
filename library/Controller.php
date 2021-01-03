<?php

namespace Library;

use \Library\View as View;
use Handler\AppHelper;
use Handler\DependencyInjection;

class Controller
{
    protected $view;
    protected $model;

    public function __construct()
    {
        $this->view = new View();
    }

    public function getIps()
    {
        return AppHelper::ipAddr();
    }

    public function generateRandomAlphaNumericString(Int $value)
    {
        return AppHelper::generateRandomAlphaNumericString($value);
    }

    public function stringNormalizer(String $str, String $delimiter)
    {
        return AppHelper::stringNormalizer($str, $delimiter);
    }

    public function redirectTo(String $url)
    {
        return AppHelper::redirectTo($url);
    }

    public function container()
    {
        return DependencyInjection::init();
    }
}
