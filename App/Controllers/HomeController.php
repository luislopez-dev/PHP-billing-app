<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
class HomeController
{
    public function __construct(public Environment $twig){}
    public function index (): Response {
        $template = $this->twig->load('Home.html.twig');
        $content = $template->render();
        return new Response($content);
    }
}