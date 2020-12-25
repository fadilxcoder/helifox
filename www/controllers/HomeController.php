<?php

use \Library\Controller as Controller;
use \Models\Home as Home;
use Tracy\Debugger as Debugger;
use Faker\Factory as Factory;

class HomeController extends Controller {

    private $faker;

    public function __construct()
    {
        parent::__construct();
        $this->model->call('Home');
        $this->hm = new Home;
        Debugger::enable(Debugger::DEVELOPMENT);
        $this->faker = Factory::create();
    }

    /*
    *
    *    E.g of method of Controller Home
    *
    *    function index()
    *    {
    *       $this->view->render('helifox-landing-page', [                           --- Rendering view by using templating engine
    *           'msg'           => '#MVC Framework',                                --- Sending variable of type String : msg
    *           'list_user'     => $this->hm->selectAll('tbl_name', 'OBJECT_CON')   --- Calling select method from model : list_user
    *       ]);
    *    }
    *
    */

    public function index()
    {
        $this->view->render('helifox-landing-page', [
            'msg' => '#MVC Framework'
        ]);
    }

    public function testingUrl()
    {
        dump($_SERVER);
    }

    public function __404()
    {
        $this->view->render('error/index');
    }
}