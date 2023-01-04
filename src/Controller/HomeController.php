<?php

namespace App\Controller;

use App\Dba\Cache;
use App\Core\Controller;
use Packages\Chrome\ChromePhp;

class HomeController extends Controller
{
    private const LP = 'hfx/lp.html.twig';

    private const HP = 'home/index.html.twig';

    public function index()
    {
        # DBA cache
        echo "<pre>";
        print_r("Available DBA handlers : ");
        foreach (dba_handlers(true) as $handler_name => $handler_version) 
        {
            // clean the versions
            $handler_version = str_replace('$', '', $handler_version);
            print_r(" - $handler_name: $handler_version\n");
        }

        $db = realpath("..")."/cache/app.db4";
        $cache = new Cache($db, 'flatfile', 'c-', true);

        dump('Value : 40', $cache->get(40));

        $key = rand(1, 100);
        dd('Value : '.$key, $cache->get(rand(1, 100)));
        # EOF DBA cache

        ChromePhp::log('hello world');
        ChromePhp::log($_SERVER);
        ChromePhp::warn('something went wrong!');
        
        return $this->render(self::LP, [
            'txt_1' => 132465,
            'txt_2' => 'DEV',
        ]);
    }
}
