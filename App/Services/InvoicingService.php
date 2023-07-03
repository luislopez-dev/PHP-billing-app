<?php

namespace App\Services;
use App\Entities\Invoice;
use App\Interfaces\IInvoicingService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\NotSupported;

class InvoicingService implements IInvoicingService
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @throws NotSupported
     */
    public function getInvoices(): array|object
    {
        return $this->entityManager
            ->getRepository(Invoice::class)
            ->findAll();
    }

    public function getInvoiceById(int $id): Invoice
    {
        return $this->entityManager
            ->getRepository(Invoice::class)
            ->find($id);
    }

}