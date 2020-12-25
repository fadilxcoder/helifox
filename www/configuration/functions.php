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

if ( ! function_exists('IP'))
{
    /*
    *    function IP to return a concatenated string of IP address.
    *    $user_ip = IP();
    */

    function IP()
    {
        $HTTP_CLIENT_IP         = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : ':/:' ;       # To check ip from share internet
        $HTTP_X_FORWARDED_FOR   = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : ':/:';  # To check ip is pass from proxy
        $REMOTE_ADDR            = $_SERVER['REMOTE_ADDR'];
        $string = $HTTP_CLIENT_IP.' - '.$HTTP_X_FORWARDED_FOR.' - '.$REMOTE_ADDR;
        return $string;
    }
}

if ( ! function_exists('generate_random_alphanumeric_string'))
{
    /*
    *    function generate_random_alphanumeric_string to return alphanumerical String of a certain range
    *    $code = generate_random_alphanumeric_string(11);
    *    --> kI80i7wNXqd
    */

    function generate_random_alphanumeric_string($length = 6)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstivwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++):
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        endfor;
        return $randomString;
    }
}

if( ! function_exists('string_normalization'))
{
    /*
    *    function string_normalization return a string with no special characters
    *
    *    $normalString = 'Vous êtes employé';
    *    $normalizeString = string_normalization($normalString,'-');
    *    --> Vous-etes-employe
    */
    function string_normalization( $string, $delimiter )
    {
        $unwanted = array(
            'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y','Ğ'=>'G', 'İ'=>'I', 'Ş'=>'S', 'ğ'=>'g', 'ı'=>'i', 'ş'=>'s',
            'ü'=>'u',  'ă'=>'a', 'Ă'=>'A', 'ș'=>'s', 'Ș'=>'S', 'ț'=>'t', 'Ț'=>'T');
        $string = strtr( $string, $unwanted );
        $string = preg_replace('/[^A-Za-z0-9\-]/', $delimiter, $string); // Replace special characters with a delimiter.
        return $string;
    }
}

if( ! function_exists('argon'))
{
    /*
    *    function argon return an encrypted string using the Argon2i hashing algorithm
    *
    *    echo argon('fadilxcoder') >> $argon2i$v=19$m=2048,t=11,p=7$VWdncmEvSEVwc3FkVnFuaQ$gu/lxoguXwodV21xc/r19HawkvTCGsCCcIRCtrbJ4lY
    *
    */
    function argon($string)
    {
        $options = ['memory_cost' => MEMORY_COST, 'time_cost' => TIME_COST, 'threads' => PARALLELISM_FACTOR];
        $encrypt = password_hash($string, PASSWORD_ARGON2I, $options);
        return $encrypt;
    }
}

if( ! function_exists('encrypt'))
{
    /*
    *    function encrypt return an encrypted string using the bcrypt hashing algorithm
    *
    *    echo encrypt('fadilxcoder') >> $2y$10$ThUdBZr9WKrjlr.wRFtxAOQ7wZrkW.mqE9NGT54U90awKctmwX.ja
    *
    */
    function encrypt($string)
    {
        $encrypt = password_hash($string, PASSWORD_DEFAULT);
        return $encrypt;
    }
}

if( !function_exists('redirect'))
{
	/*
    *    function redirect will redirect to any URL passed as parameter
    *
    *    redirect('https://www.google.com') >> REDIRECT to google.com
    *
    */
	function redirect($url)
	{
		header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		header('Location: ' . $url);
		exit;
	}
}

if( !function_exists('create_cookie'))
{
	/*
    *    function create_cookie will create cookie for the web app
    *
    *    $arr = array();
    *    $arr['_name']      = 'helifox_cookie';
    *    $arr['_value']     = 'kI80i7wNXqd';
    *    $arr['_duration']  = time() + (86400 * 30)  # 86400 = 1 day
    *
    *    create_cookie($arr);
    */
	function create_cookie($arr)
	{
		return ( setcookie($arr['_name'], $arr['_value'], $arr['_duration'], "/") );
	}
}

if( !function_exists('destroy_cookie'))
{
	/*
    *    function destroy_cookie will destroy a cookie for the web app
    *
    *    destroy_cookie('helifox_cookie');
    */
	function destroy_cookie($cookie_name)
	{
		return ( setcookie($cookie_name, '', time() - 3600, "/") );
	}
}
