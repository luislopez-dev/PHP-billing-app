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

    public function deleteInvoice(int $id): void
    {
        $invoiceReference = $this->entityManager
            ->getReference(Invoice::class, $id);
        $this->entityManager->remove($invoiceReference);
        $this->entityManager->flush();
    }

    public function createInvoice(Invoice $invoice): void
    {
        $invoice = new Invoice();
        $this->entityManager->persist($invoice);
        $this->entityManager->flush();
    }

    public function updateInvoice(Invoice $invoice): void
    {
        // TODO: Implement updateInvoice() method.
    }

}