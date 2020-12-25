<?php

namespace Library;

use \Library\View as View;
use \Library\Model as Model;

class Controller{

    public function __construct()
    {
        $this->view = new View;
        $this->model = new Model;
    }
}
