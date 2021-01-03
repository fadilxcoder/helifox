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

        $container['DI_debugger'] = function () {
            return Debugger::enable(Debugger::DEVELOPMENT);
        };

        $container['DI_factory'] = function () {
            return Factory::create();
        };

        $container['DI_request'] = function () {
            return Request::createFromGlobals();
        };

        $container['DI_appHelper'] = function ($ctn) {
            return new AppHelper($ctn);
        };

        $container['DI_homeModel'] = function () {
            $model = new Model();
            $model->call('Home');
            return new Home;
        };

        return $container;
    }
} 