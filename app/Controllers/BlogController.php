<?php


namespace app\Controllers;

use framework\Application;

class BlogController
{
    public function index()
    {
        echo '<h1>Blog page</h1>';
    }

    public function category($data = [])
    {
        echo '<h1>Blog category</h1>';

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function view($data = [])
    {

        echo '<h1>Blog view</h1>';

        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }

}