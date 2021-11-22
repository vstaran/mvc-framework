<?php


namespace app\Controllers;

use framework\Application;

class HomeController
{
    public function index($data = [])
    {
        print_r($data);

        echo 'Home page';
    }
}