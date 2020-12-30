<?php

use \Library\Controller as Controller;
use Handler\DependencyInjection;

class HomeController extends Controller 
{
    private $depInj;

    public function __construct()
    {
        parent::__construct();
        $this->depInj = $this->container();
        // $this->depInj = DependencyInjection::init();
        $this->depInj['DI_debugger'];
        $this->depInj['DI_factory'];
    }

    public function index()
    {
        $this->view->render('helifox-landing-page', [
            'heading' => 'HeliFox',
            'text' => 'XMicro Framework',
            'users' =>$this->depInj['DI_homeModel']->getAll(),
        ]);
    }

    public function testingUrl()
    {
        $this->redirectTo('home');
    }

    public function __404()
    {
        $this->view->render('error/index');
    }
}
