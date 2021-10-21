<?php


namespace app\Controllers;


use framework\Application;
use Learning\MVC\Controller\ControllerInterface;

class HomeController implements ControllerInterface
{
    public function __construct()
    {
        $cache = Application::getInstance()->get('cache');
        $cache->put('test', 'Hello world!!!!!!!');
    }

    public function index()
    {
        $cache = Application::getInstance()->get('cache');
        echo $cache->get('test');

        $math = Application::getInstance()->get('math');
        echo $math->sum(5, 8);
    }
}