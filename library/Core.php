<?php

namespace Library;

use \Library\Error as Error;

class Core{

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        require __DIR__ . '/../configuration/routes.php';
        $this->cookies();
        $url = (isset($_GET['url']) != '') ? $_GET['url'] : $route['default'];
        $url = rtrim($url, '/');

        foreach ($route as $key => $value) :
            if ($url == $key) :
                $url = $value;
            endif;
        endforeach;
        
        $url = explode('@',$url);
        $file =  __DIR__ . '/../controllers/' . $url[0] . '.php';

        if (file_exists($file)) :
            require $file;
            $controller = new $url[0];
            $controller->{ $url[1] }();
            return;
        endif;

        $controller = new Error;
        return;
    }


    private function cookies()
    {
        define('CN',    'DYNAMICWEB');
        define('XPB',   'ASP.NET');
        define('XAV',   '4.0.30319');
        define('XAMV',  '5.1');
        define('XFO',   'SAMEORIGIN');
        define('CDN',   'Incapsula');
        define('CACHE', 'no-cache, no-store, must-revalidate');
        define('AID',    'appId=cid-vfx:'.rand(1,999999).'-'.rand(1,999999).'-'.rand(1,999999).'-'.rand(1,999999).'-'.rand(1,999999).'');
        define('XSS',    '1; mode=block');
        define('XCTO',   'nosniff');

        header('Cache-Control:'.CACHE);
        header('Request-Context: '.AID);
        header('X-Powered-By: '.XPB);
        header('X-AspNet-Version: '.XAV);
        header('X-AspNetMvc-Version: '.XAMV);
        header('X-Frame-Options: '.XFO);
        header('X-CDN: '.CDN);
        header('X-XSS-Protection: '.XSS);
        header('X-Content-Type-Options: '.XCTO);
        header('Pragma: no-cache');
        header('Expires: 0');

        $cv = date('ymd') . time() . rand(1000,1000000000);
        setcookie(CN, $cv, time() + (86400 * 30), "/");

        return;
    }

}
