<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use App\Config\DoctrineConfig;
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

// Usa $entityManager para trabajar con tus entidades de Doctrine...

$request = Request::createFromGlobals();
$routes = include_once('routes.php');
$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $parameters = $matcher->match($request->getPathInfo());
    $response = call_user_func($parameters['_controller'], $request);
} catch (ResourceNotFoundException $e) {
    $view = (new Environment(new FilesystemLoader(__DIR__ . '/Views')))->load('404.html.twig');
    $response = new Response($view->render(), 404);
} catch (\Exception $e) {
    $response = new Response('An error occurred', 500);
    echo $e->getMessage();
}
$response->send();