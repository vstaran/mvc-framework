<?php

use framework\Components\Router\Route;
use app\Controllers\HomeController;
use app\Controllers\BlogController;


/**
 * @var framework\Components\Router\Router $this
 */

$this->addRoute(new Route('home_page', '/', [HomeController::class], ['GET']));
$this->addRoute(new Route('blog_index', '/blog', [BlogController::class]));
$this->addRoute(new Route('blog_category', '/blog/{category_id}', [BlogController::class, 'category']));
$this->addRoute(new Route('blog_view', '/blog/{category_id}/{view_id}', [BlogController::class, 'view']));
