<?php

/*
 *  +------------------------------------------+
 *  ¦                 |\__/|                   ¦
 *  ¦                / - - \                   ¦
 *  ¦               /_.~ ~,_\                  ¦
 *  ¦                  \@/                     ¦
 *  ¦------------------------------------------¦
 *  ¦           HELIFOX PHP FRAMEWORK          ¦
 *  ¦------------------------------------------¦
 *  ¦      www.facebook.com/fadil.xcoder       ¦
 *  +------------------------------------------+
 *
 *  HELIFOX MVC FRAMEWORK
 *
 *  A Light & Cunning MVC Framework, built for PHP developers to create web apps.
 *
 * Copyright (c) Wednesday, 13 September 2017 ~ DAY OF THE PROGRAMMER ~ Fadil Rosun-Mungur ~ FADILXCODER
 *
*/

namespace Library;

use \Library\Database as Database;

class Model{

    public function __construct()
    {
        $this->db = new Database;
    }

    public function call($name)
    {
        require __DIR__.'/../models/'.$name.'.php';
    }
}
