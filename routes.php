<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('Home', new Route('/', array(
    '_controller' => [$container->get('homeController'), 'index']
)));

$routes->add('Invoice', new Route('/invoices', array(
    '_controller' => [$container->get('invoiceController'), 'index']
)));

$routes->add('Product', new Route('/products', array(
    '_controller' => [$container->get('productController'), 'index']
)));

return $routes;