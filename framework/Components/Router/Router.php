<?php


namespace framework\Components\Router;

use framework\Interfaces\RouteInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class Router
 * @package framework\Components\Router
 */
class Router implements RouteInterface
{
    private const NO_ROUTE = 404;

    /**
     * @var \ArrayIterator<Route>
     */
    private $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = new \ArrayIterator();

        include dirname(__DIR__, 3) . "/routes/web.php";
    }

    public function addRoute(Route $route): self
    {
        $this->routes->offsetSet($route->getName(), $route);
        return $this;
    }

    public function route(): callable
    {
        //print_r($this->routes);
        $route = $this->matchFromPath($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

        $parameters = $route->getParameters();
        $arguments = $route->getVars();

        $controllerName = $parameters[0];
        $methodName = $parameters[1] ?? 'index';

        $controller = new $controllerName();

        return function () use ($controller, $methodName, $arguments) {
            call_user_func([$controller, $methodName], $arguments);

            //$controller($arguments);
            //$controller(...array_values($arguments));
        };

    }


    public function match(ServerRequestInterface $serverRequest): Route
    {
        return $this->matchFromPath($serverRequest->getUri()->getPath(), $serverRequest->getMethod());
    }

    public function matchFromPath(string $path, string $method): Route
    {
        foreach ($this->routes as $route) {
            if ($route->match($path, $method) === false) {
                continue;
            }
            return $route;
        }

        throw new \Exception(
            'No route found for ' . $method,
            self::NO_ROUTE
        );
    }


}
