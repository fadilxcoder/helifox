<?php

use \Library\Controller as Controller;
use \Models\Home as Home;
use Tracy\Debugger as Debugger;
use Faker\Factory as Factory;
use Symfony\Component\HttpFoundation\Request;
use Handler\AppHelper;

class HomeController extends Controller {

    private $faker;
    private $homeModel;
    private $request;

    public function __construct()
    {
        parent::__construct();
        $this->model->call('Home');
        $this->homeModel = new Home;
        Debugger::enable(Debugger::DEVELOPMENT);
        $this->faker = Factory::create();
        $this->request = Request::createFromGlobals();
    }

    public function index()
    {
        $this->view->render('helifox-landing-page', [
            'heading' => 'HeliFox',
            'text' => 'XMicro Framework',
            'users' => $this->homeModel->getAll(),
        ]);
    }

    public function testingUrl()
    {
        dump($this->faker);
        dump($this->request->server->get('HOSTNAME'));
        dump(AppHelper::ipAddr());
        dump(AppHelper::generateRandomAlphaNumericString(25));

        $normalString = 'Vous êtes employé';
        $normalizeString = AppHelper::stringNormalizer($normalString,'-');
        dump($normalizeString);
        dump(AUTHOR);

        // AppHelper::redirectTo('https://medoo.in/api/new');
    }

    public function __404()
    {
        $this->view->render('error/index');
    }
}
