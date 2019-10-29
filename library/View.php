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

class View
{
    public function render($name, $include = false)
    {
        if($include == true):
            require __DIR__.'/../views/'.$name.'.php';
        else:
            require __DIR__.'/../views/inc/header.php';
            require __DIR__.'/../views/'.$name.'.php';
            require __DIR__.'/../views/inc/footer.php';
        endif;
        exit; // No futher codes should be added below the rendering.
    }
}
