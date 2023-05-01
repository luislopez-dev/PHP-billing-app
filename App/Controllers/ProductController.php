<?php

namespace App\Controllers;

use App\Entities\Product;
use App\Interfaces\IProductService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Twig\Environment;

class ProductController
{
    private EntityManager $entityManager;
    private IProductService $productService;

    /**
     * @param IProductService $productService
     * @param Environment $twig
     */
    public function __construct(IProductService $productService, public Environment $twig)
    {
        $this->productService = $productService;
    }

    public function index() : Response {
        $products = $this->productService->getProducts();
        $view = $this->twig->load('Product/Index.html.twig');
        $content = $view->render(['products' => $products]);
        return new Response($content);
    }
    public function new(Product $product) : Response {
        return new Response();
    }
    public function delete(Product $product) : Response {
        return new Response();
    }
    public function update(Product $product): Response {
        return new Response();
    }
    public function get(Request $request): Response {
        $id = (int) $request->attributes->get('id');
        $product = $this->productService->getProductById($id);
        if (is_null($product)){
            $view = $this->twig->load('404.html.twig');
            return new Response();
        }
        $view = $this->twig->load('Product/get.html.twig');
        $content = $view->render(['product' => $product]);
        return new Response($content);
    }
}