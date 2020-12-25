<?php

namespace Library;

use \Library\View as View;

class Error{

    public function __construct()
    {
        $this->index();
    }

    public function index()
    {
        $this->view = new View;
        $this->view->render('error/index');
    }
}
