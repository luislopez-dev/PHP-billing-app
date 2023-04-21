<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class InvoiceController
{
    public function __construct(public Environment $twig){}
    public function index(): Response {
        $view = $this->twig->load('Invoice/Index.html.twig');
        $content = $view->render();
        return new Response($content);
    }
}