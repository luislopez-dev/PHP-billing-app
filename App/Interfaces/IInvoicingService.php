<?php

namespace App\Interfaces;

use App\Entities\Invoice;

interface IInvoicingService
{
    public function getInvoices() : array|object;

    public function getInvoiceById(int $id) : Invoice;

    public function deleteInvoice(int $id) : void;

    public function createInvoice(Invoice $invoice) : void;
}