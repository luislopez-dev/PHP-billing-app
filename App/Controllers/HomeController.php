<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
class HomeController
{
    public function __construct(public Environment $twig){}
    public function index (): Response {
        $view = $this->twig->load('Home.html.twig');
        $content = $view->render();
        return new Response($content);
    }
}