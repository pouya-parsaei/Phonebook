<?php
namespace App\Utilities;

class Url
{
    public static function current()
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public static function currentRoute()
    {
        return strtok($_SERVER['REQUEST_URI'],'?');
    }

    public static function segments()
    {
        return explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    }

    public static function queryParameters()
    {
        return parse_url( self::current(), $component = -1 );


    }
}