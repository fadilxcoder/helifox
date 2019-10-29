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
 *
 *      E.g
 *
 *      $route['home']                      = 'HomeController@index';
 *      $route['contact-us.aspx']           = 'HomeController@contactus';
 *      $route['about.jsp']                 = 'HomeController@about';
 *
 *
 *      if you want a particular URL to show a 404 page
 *
 *      $route['about-us.jsp']                 = 'HomeController@__404';
 *
 *      Do NOT remove $route['default'], but you can change it..
*/
$route['default']   = 'HomeController@index';
$route['home']      = 'HomeController@index';
