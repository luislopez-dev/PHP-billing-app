<?php

namespace App\Services;
use App\Entities\Product;
use App\Interfaces\IProductService;
use Doctrine\ORM\EntityManager;

class ProductService implements IProductService
{
    private EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function getProducts() : array|object {
        return $this->entityManager
            ->getRepository(Product::class)
            ->findAll();
    }
    public function getProductById(int $id): Product
    {
        return $this->entityManager
                ->getRepository(Product::class)
                ->find($id);
    }
}