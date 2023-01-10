<?php

namespace App\Controller;

use App\Core\Controller;
use Packages\Memcache\Gui;

class CacheController extends Controller
{
    public function index()
    {
        return new Gui();
    }
}