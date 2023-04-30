<?php

namespace App\Controllers;

use App\Interfaces\IProductService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\NotSupported;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ProductController
{
    private EntityManager $entityManager;
    private IProductService $productService;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(IProductService $productService, public Environment $twig)
    {
        $this->productService = $productService;
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws NotSupported
     * @throws LoaderError
     */
    public function index() : Response {
        $products = $this->productService->getProducts();
        $view = $this->twig->load('Product/Index.html.twig');
        $content = $view->render(['products' => $products]);
        return new Response($content);
    }
}