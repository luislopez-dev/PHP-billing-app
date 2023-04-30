<?php

namespace App\Services;
use App\Entities\Product;
use App\Interfaces\IProductService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\NotSupported;

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

    /**
     * @throws NotSupported
     */
    public function getProducts() : array|object {
        return $this->entityManager
            ->getRepository(Product::class)
            ->findAll();
    }
}