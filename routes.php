<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use App\Controllers\HelloController;
use App\Controllers\ProductController;
use App\Services\PhotoService;

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello', array(
    '_controller' => [new HelloController(), 'index']
)));

$routes->add('products', new Route('/products', array(
    '_controller' => [new ProductController(new PhotoService()), 'index']
)));

return $routes;