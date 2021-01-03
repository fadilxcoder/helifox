<?php

use \Library\Controller as Controller;

class HomeController extends Controller {

    private $container;
    private $home;

    public function __construct()
    {
        parent::__construct();
        $this->container = $this->container();
        $this->container['DI_debugger'];
        $this->container['DI_factory'];
        $this->home = $this->container['DI_homeModel'];
    }

    public function index()
    {
        $this->view->render('helifox-landing-page', [
            'heading' => 'HeliFox',
            'text' => 'XMicro Framework',
            'users' => $this->home->getAll(),
        ]);
    }

    public function redirection()
    {
        $this->redirectTo('home');
    }

    public function __404()
    {
        $this->view->render('error/index');
    }
}
