<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use App\Controllers\HelloController;
use App\Controllers\ProductController;
use App\Services\PhotoService;
use App\Controllers\HomeController;

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/Views');
$twig = new Twig\Environment($loader, [
    'debug' => true,
]);

$routes = new RouteCollection();
// $twig = (new Container())->get('twig');

$routes->add('hello', new Route('/hello', array(
    '_controller' => [new HelloController(), 'index']
)));

$routes->add('products', new Route('/products', array(
    '_controller' => [new ProductController(new PhotoService()), 'index']
)));

$routes->add('Home', new Route('/', array(
    '_controller' => [new HomeController($twig), 'index']
)));

return $routes;