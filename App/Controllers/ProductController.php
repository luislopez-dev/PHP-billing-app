<?php

namespace App\Controllers;

use App\Entities\Product;
use App\Interfaces\IInvoicingService;
use App\Interfaces\IProductService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Twig\Environment;

class ProductController
{
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

    public function new(Request $request) : Response {
        $view = $this->twig->load('Product/new.html.twig');
        $content = $view->render([]);
        return new Response($content);
    }

    public function create(Request $request) : void {

    }

    public function delete(Product $product) : Response {
        return new Response();
    }

    public function update(Product $product): Response {
        return new Response();
    }

    public function show(Request $request): Response {
       $id = (int) $request->query->get('id');
        if (empty($id)) {
            throw new \InvalidArgumentException("ID is required");
        }
        $product = $this->productService->getProductById($id);
        if (is_null($product)){
            $view = $this->twig->load('404.html.twig');
            return new Response();
        }
        $view = $this->twig->load('Product/show.html.twig');
        $content = $view->render(['product' => $product]);
        return new Response($content);
    }
}