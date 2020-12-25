<?php

if ( ! function_exists('IP'))
{
    /*
    *    Return a concatenated string of IP.
    *
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
    *    Return alphanumerical String of a certain range
    *
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
    *    Return a string with no special characters
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

if( !function_exists('redirect'))
{
	/*
    *    Redirect to any URL passed as parameter
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
