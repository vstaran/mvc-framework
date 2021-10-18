<?php


namespace framework\Components\Router;


use app\Controllers\HomeController;
use framework\Interfaces\RouteInterface;

class Router implements RouteInterface
{
    public function route(): callable
    {
        if ($_SERVER['REQUEST_URI'] === '/') {
            $controllerName = '';
            $controller = new $controllerName();
            return [$controller, 'index'];
        }

        throw new \Exception('Not found');
    }
}