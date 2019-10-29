<?php

use \Library\Controller as Controller;
use \Models\Home as Home;

class HomeController extends Controller{

    public function __construct()
    {
        parent::__construct();
        /*
        *    Loading Home Model Class in order to use predefined methods
        */
        $this->model->call('Home');
        $this->hm = new Home;
    }

    /*
    *
    *    E.g of method of Controller Home
    *
    *    function index()
    *    {
    *        $this->view->list_user = $this->hm->select('users', 'OBJECT_CON');     ------    Calling select method from model : list_user
    *        $this->view->msg = '#MVC Framework';                                   ------    Sending String msg
    *        $this->view->render('home-page',false);                                ------    if view has header/footer on same page, use true,
    *                                                                                         else it is included, use false.
    *    }
    *
    */

    public function index()
    {
        $this->view->msg = '#MVC Framework';
        $this->view->render('helifox-landing-page',true);
    }

    public function __404()
    {
        $this->view->msg = 'PAGE NOT FOUND';
        $this->view->render('error/index', true);
    }
}
