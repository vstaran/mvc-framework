<?php


namespace framework;


use framework\Components\ComponentFactoryAbstract;
use framework\Interfaces\ContainerInterface;
use framework\Interfaces\RunnableInterface;

class Application implements RunnableInterface, ContainerInterface
{
    protected static $instance;

    /*protected $router;

    protected $cache;*/

    protected $components = [];

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function __construct()
    {
        /*$this->router = $router;
        $this->cache = $cache;*/
    }

    public function configure($config)
    {
        if (isset($config['components'])) {
            foreach ($config['components'] as $name => $item) {
                $factoryName = $item['factory'];
                /** @var ComponentFactoryAbstract $factory */
                $factory = new $factoryName();
                $instance = $factory->createInstance();
                $this->components[$name] = $instance;
            }
        }
    }

    public function run()
    {
        try {
            $action = $this->get('router')->route();
            $action();
        } catch (\Throwable $exception) {
            http_response_code();
            echo $exception->getMessage();
            echo '<br>Not found';
        }
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->components)) {
            return $this->components[$key];
        }

        throw new \Exception('Component ' . $key . ' not found');
    }

    public function set($key, $value)
    {
        // TODO: Implement set() method.
    }
}