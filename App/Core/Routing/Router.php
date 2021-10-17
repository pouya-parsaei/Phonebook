<?php

namespace App\Core\Routing;

use App\Core\Request;

class Router
{
    private $request;
    private $routes;
    private $currentRoute;
    private  $globalMiddlewares;
    const BASE_CONTROLLER = '\App\Controllers\\';
    public function __construct($request)
    {
        $this->request = $request;
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->currentRoute = $this->findRoute($this->request) ?? null;
        # run middleware here
        $this->globalMiddlewares = (new \App\Middleware\GlobalMiddlewares())->getGlobalMiddlewares();
        $this->runGlobalMiddleware();
        $this->runRouteMiddleware();
    }

    public function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if (!in_array($request->method(), $route['methods']))
                continue;
            if ($this->regex_matched($route))
                return $route;
        }
        return null;
    }

    public function regex_matched($route)
    {
        global $request;
        $pattern = "/^" . str_replace(['/', '{', '}'], ['\/', '(?<', '>[-%\w]+)'], $route['uri']) . "$/";
        $result = preg_match($pattern, $this->request->uri(), $matches);
        if (!$result) {
            return false;
        }
        foreach ($matches as $key => $value) {
            if (!is_int($key)) {
                $request->addRouteParam($key, $value);
            }
        }
        return true;
    }

    private function runGlobalMiddleware()
    {
        foreach ($this->globalMiddlewares as $globalMiddleware) {
            (new $globalMiddleware())->handle();
        }
    }

    private function runRouteMiddleware()
    {
        $middleware = $this->currentRoute['middleware'] ?? [];
        foreach ($middleware as $middlewarClass) {
            $middlewareObj = new $middlewarClass;
            $middlewareObj->handle();
        }
    }


    private function dispatch405()
    {
        header("HTTP/1.0 405 Method Not Allowed");
        view('errors.405');
        die();
    }
    private function invalidRequest($request)
    {
        if (is_null($this->findRoute($request)))
            return true;
    }


    public function run()
    {
        # 405: invalid request method
        if ($this->invalidRequest($this->request)) {
            $this->dispatch405();
        }
        #
        # 404: uri not exists
        if (is_null($this->currentRoute))
            $this->dispatch404();
        $this->dispatch($this->currentRoute);
    }

    private function dispatch($route)
    {
        $action = $route['action'];
        # action : null
        if (is_null($action) || empty($action)) {
            return;
        }

        # action : clousure
        if (is_callable($action)) {
            $action();
            // call_user_func($action)
        }
        # action : Controller@method
        if (is_string($action))
            $action = explode('@', $action);

        # action : ['Controller','method']
        if (is_array($action)) {
            $className = self::BASE_CONTROLLER . $action[0];
            $method = $action[1];
            if (!class_exists($className))
                throw new \Exception("Class $className does not exist!");

            $controller = new $className;
            if (!method_exists($className, $method))
                throw new \Exception("Method $method does not exist in class $className!");
            $controller->{$method}();
        }
    }
    public function dispatch404()
    {
        header('HTTP/1.0 404 Not Found');
        view('errors.404');
        die();
    }
}
