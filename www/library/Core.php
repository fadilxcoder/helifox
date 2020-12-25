<?php

/*
 *  +------------------------------------------+
 *  ¦                 |\__/|                   ¦
 *  ¦                / - - \                   ¦
 *  ¦               /_.~ ~,_\                  ¦
 *  ¦                  \@/                     ¦
 *  ¦------------------------------------------¦
 *  ¦           HELIFOX PHP FRAMEWORK          ¦
 *  ¦------------------------------------------¦
 *  ¦      www.facebook.com/fadil.xcoder       ¦
 *  +------------------------------------------+
 *
 *  HELIFOX MVC FRAMEWORK
 *
 *  A Light & Cunning MVC Framework, built for PHP developers to create web apps.
 *
 * Copyright (c) Wednesday, 13 September 2017 ~ DAY OF THE PROGRAMMER ~ Fadil Rosun-Mungur ~ FADILXCODER
 *
*/
namespace Library;

use \Library\Error as Error;

class Core{

    public function __construct()
    {
        require __DIR__.'/../configuration/routes.php';
        $this->cookies();
        // Setting routes conditions if url does not exist.
        $url = (isset($_GET['url']) != '') ? $_GET['url'] : $route['default'];
        $url = rtrim($url, '@');

        // Getting the route needed from routes.php file
        foreach($route as $key=>$value):
            if($url == $key):
                $url = $value;
            endif;
        endforeach;

        // Breaking routes into Controller & Methods.
        $url = explode('@',$url);

        /* Array [0] => controller
         * Array [1] => Methods
         *
         * NOTE : There is no Array [2], Array [3], ... USE URL?ref=data.
         *
        */
        $file =  __DIR__.'/../controllers/'.$url[0].'.php';
        if(file_exists($file)):
            require $file;
            $controller = new $url[0];
            if(isset($url[1])):
                $controller->{ $url[1] }();
            endif;
        else:
            $controller = new Error;
            return false;
        endif;
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
        header('CIP: '.IP());
        header('Pragma: no-cache');
        header('Expires: 0');

        $cv = date('ymd').time().rand(1,1000000000);
        /*
        * COOKIE set for 30 days
        * 60 seconds * 60 minutes * 24 hrs = 86400
        */
        setcookie(CN, $cv, time() + (86400 * 30), "/");
    }

}
