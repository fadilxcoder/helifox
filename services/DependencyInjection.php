<?php

namespace Handler;

use Pimple\Container;
use Tracy\Debugger as Debugger;
use Faker\Factory as Factory;
use Symfony\Component\HttpFoundation\Request;
use Handler\AppHelper;
use \Library\Model;
use \Models\Home;


class DependencyInjection
{
    public static function init()
    {
        $container = new Container();

        $container['DI_debugger'] = function ($c) {
            return Debugger::enable(Debugger::DEVELOPMENT);
        };

        $container['DI_factory'] = function ($c) {
            return Factory::create();
        };

        $container['DI_request'] = function ($c) {
            return Request::createFromGlobals();
        };

        $container['DI_appHelper'] = function ($c) {
            return new AppHelper($c);
        };

        $container['DI_homeModel'] = function ($c) {
            $model = new Model();
            $model->call('Home');
            return new Home;
        };

        return $container;
    }
}