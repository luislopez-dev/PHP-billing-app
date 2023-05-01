<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('Home', new Route('/', array(
    '_controller' => [$container->get('homeController'), 'index']
)));

$routes->add('Invoices', new Route('/invoices', array(
    '_controller' => [$container->get('invoiceController'), 'index']
)));

$routes->add('Products', new Route('/products', array(
    '_controller' => [$container->get('productController'), 'index']
)));

$routes->add('Product', new Route('/product', array(
    '_controller' => [$container->get('productController'), 'show']
)));

$routes->add('New Products', new Route('/product/new', array(
    '_controller' => [$container->get('productController'), 'new']
)));

return $routes;