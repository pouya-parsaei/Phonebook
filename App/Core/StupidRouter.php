<?php

namespace App\Core;

use App\Utilities\Url;

class StupidRouter
{
    private $routes;
    public function __construct()
    {

        $this->routes = [
            '/pouya/blue' => 'colors/blue.php',
            '/pouya/red' => 'colors/red.php',
            '/pouya/green' => 'colors/green.php'
        ];
    }

    public function run()
    {
        $currentRoute = Url::currentRoute();

        foreach ($this->routes as $route => $view) {
            if ($currentRoute == $route) {
                $this->includeAndDie(BASE_PATH . "views/$view");
            }
            header("HTTP/1.1 404 Not Found");
            $this->includeAndDie(BASE_PATH . "views/errors/404.php");
        }
    }

    private function includeAndDie($viewPath)
    {
        include $viewPath;
        die();
    }
}
