<?php

namespace App\Interfaces;

use App\Entities\Product;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\Response;

interface IProductService
{
    public function getProducts() : array|object;

    public function getProductById(int $id): Product;
    /*
    public function deleteProduct(int $id): void;
    public function updateProduct(Product $product): void;
    public function createProduct(Product $product): Product;
    */
}