<?php

namespace App\Core;

class Request
{
    private $params;
    private $method;
    private $agent;
    private $ip;
    private $uri;
    private $RouteParams;

    public function __construct()
    {
        foreach ($_REQUEST as $key => $value) {
            $_REQUEST[$key] = xss_clean($value);
        }
        $this->params = $_REQUEST; # params
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->uri = strtok($_SERVER['REQUEST_URI'], '?');
    }

    public function addRouteParam($key,$value)
    {
        $this->RouteParams[$key] = $value;
    }
    public function getRouteParam($key)
    {
        return $this->RouteParams[$key];
    }
    public function getRouteParams()
    {
        return $this->RouteParams;
    }
    public function __get($prop)
    {
        return (array_key_exists($prop, $this->params)) ? $this->params[$prop]: null;
    }

    public function method()
    {
        return $this->method;
    }
    public function agent()
    {
        return $this->agent;
    }
    public function params()
    {
        return $this->params;
    }
    public function uri()
    {
        return $this->uri;
    }

    public function ip()
    {
        return $this->ip;
    }
    public function input($key)
    {
        return $this->params[$key] ?? null;
    }
    public function isset($key)
    {
        return isset($this->params[$key]);
    }
    public function redirect($route)
    {
        header('Location: ' . site_url($route));
        die();
    }
}
